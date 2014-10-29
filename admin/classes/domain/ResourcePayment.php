<?php

/*
**************************************************************************************************************************
** CORAL Resources Module v. 1.0
**
** Copyright (c) 2010 University of Notre Dame
**
** This file is part of CORAL.
**
** CORAL is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
**
** CORAL is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.
**
** You should have received a copy of the GNU General Public License along with CORAL.  If not, see <http://www.gnu.org/licenses/>.
**
**************************************************************************************************************************
*/

class ResourcePayment extends DatabaseObject {

	protected function defineRelationships() {}

	protected function overridePrimaryKeyName() {}

	//returns array of ResourcePayment objects
	public function getPaymentAmountChangeFromPreviousYear(){
		$id = $this->resourceID;
		$year = $this->year;
		$fundName = $this->fundName;
		$currency = $this->currencyCode;
		if ((isset($year)) && ($year != '') && (isset($fundName)) && ($fundName != '')){
			$sql = "SELECT SUM(paymentAmount) AS total FROM ResourcePayment WHERE resourceID = '%s' AND year = '%s' AND fundName = '%s' AND currencyCode = '%s'";
			$fundName = mysql_real_escape_string($fundName);
			$currency = mysql_real_escape_string($currency);
			$query = sprintf($sql, $id, mysql_real_escape_string(previous_year($year)), $fundName, $currency);
			$result = $this->db->processQuery($query, 'assoc');
			if ((isset($result['total'])) && ($result['total'] > 0)){
				$prev_total = $result['total'];
				$query = sprintf($sql, $id, mysql_real_escape_string($year), $fundName, $currency);
				$result = $this->db->processQuery($query, 'assoc');
				if (isset($result['total'])){
					return sprintf('%+.1f', 100 * ( ($result['total'] - $prev_total) / $prev_total ));
				}
			}
		}
		return 'n/a';
	}
}

?>
