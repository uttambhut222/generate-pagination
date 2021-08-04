<?php

namespace TheOpenEyes\GeneratePagination;

use TheOpenEyes\SortAssociativeArray\SortAssociativeArray;

class GeneratePagination
{
	public static function generate($responseArr = array(), $limit, $page, $searchCondition, $sortOrder, $searchColumn = array())
	{

		$returnArr =  $resultArr = array();
		if ($searchCondition['searchQuery'] != "" && !empty($searchColumn)) {
			$searchData = preg_quote(strtolower(trim($searchCondition['searchQuery'])), '~'); // don't forget to quote input string!
			foreach ($searchColumn as $columnName) {
				$resultArr += preg_grep('~' . $searchData . '~', array_map('strtolower', (array_column($responseArr, $columnName))));
			}
			$responseArr = array_intersect_key($responseArr, array_flip(array_keys($resultArr)));
		}

		$returnArr['totalRecord'] = $total = count($responseArr);
		$totalPages = ceil($total / $limit);
		if (is_array($sortOrder)) {
			foreach ($sortOrder as $key => $val) {
				if (isset($val['dir'])) {
					$responseArr = SortAssociativeArray::column($responseArr, $val['field'], ($val['dir'] == 'desc') ? SORT_DESC : SORT_ASC);
				}
			}
		}
		$page = max($page, 1);
		$page = min($page, $totalPages);
		$offset = ($page - 1) * $limit;
		if ($offset < 0) {
			$offset = 0;
		}

		$returnArr['result'] = array_slice($responseArr, $offset, $limit);
		return $returnArr;
	}
}
