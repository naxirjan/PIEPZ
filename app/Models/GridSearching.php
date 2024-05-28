<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class GridSearching extends Model
{
    public static function getSearchFilterResult($objRequest, &$sSearchField, &$sSearchOperator, &$sSearchValue){

      $aSearchOperators = array(
        "eq" => "=",
        "ne" => "!=",
        "lt" => "<",
        "le" => "<=",
        "gt" => ">",
        "ge" => ">=",
        "in" => "IN",
        "bw" => "LIKE",
        "ew" => "LIKE",
        "cn" => "LIKE");

      $sSearchField = $objRequest->input('searchField');
      $sSearchValue = $objRequest->input('searchString');
      $sSearchOperator = $objRequest->input('searchOper');

      $sSearchOperator = ($aSearchOperators[$sSearchOperator] ?? "");
      $sSearchField = "MT.$sSearchField";

      switch ($sSearchOperator){

        case "in": $sSearchValue = " IN($sSearchValue)"; break;
        case "bw": $sSearchValue = " $sSearchValue%"; break;
        case "ew": $sSearchValue = " %$sSearchValue"; break;
        case "cn": $sSearchValue = " %$sSearchValue%"; break;
      }
    }
}
