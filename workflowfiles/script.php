<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 16/6/22
 * Time: 下午5:13
 */

require ('workflows.php');
require ('baidu_transapi.php');

/**
 *
 */
class Translate
{
  public function getTranslation($query){
    $wf = new Workflows ();
    $json  = translate($query, "auto", "auto");
    if ($json == null) {
      $wf->result('',
                  '',
                  '没查到呀',
                  '没找到对应的翻译',
                  'translate.png',false);
    } else {
      foreach ($json[trans_result] as $translation):
          $result['src'] = $translation['src'];
          $result['dst'] = $translation['dst'];
          $wf->result(1,
                      $result['dst'],
                      $translation['dst'],
                      $query,
                      'translate.png');
        endforeach;
        echo $wf->toxml ();
  }
}
}
