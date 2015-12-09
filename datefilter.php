<?php
//dateFilter v1.0
function dateFilter()
{
  $minYear            = "1900"; //максимальный в прошлом год.
  $maxYear            = "";     // Максимальный год, если переменная пуста, то максимальный год будет текущим.
  $selectedYearOffset = "";     // Смещение по выбранному году, если пустое, то будет выбран текущий год.
  // Указываем на каком языке выводить месяцы, если значение пусто, но английском, но можно указать eng.
  // В данном примере доступ 2 языка - Английский и Русский;
  $lang               = "rus";
  //Массивы с переодом месяца на язык
  $engMonth = array('01'=>'January',
                '02'=>'February',
                '03'=>'March',
                '04'=>'April',
                '05'=>'May',
                '06'=>'June',
                '07'=>'July',
                '08'=>'August',
                '09'=>'September',
                '10'=>'October',
                '11'=>'November',
                '12'=>'December',
            );
  $rusMonth = array('01'=>'Январь',
                    '02'=>'Февраль',
                    '03'=>'Март',
                    '04'=>'Апрель',
                    '05'=>'Май',
                    '06'=>'Июнь',
                    '07'=>'Июль',
                    '08'=>'Август',
                    '09'=>'Сентябрь',
                    '10'=>'Октбярь',
                    '11'=>'Нобярь',
                    '12'=>'Декабрь',
                );
  // Устанавливаем какой массив с переводом использовать
  switch ($lang) {
      case 'rus': $monthNameArr =  $rusMonth;  break;
      default   : $monthNameArr =  $engMonth;  break;
  }
  //Формируем массив с месяцами, отмечая по ходу текущий месяц
  $monthArr = array();
  for ($i=1; $i <= 12; $i++) {
      $number = str_pad($i, 2, '0', STR_PAD_LEFT);
      $monthArr[] = array('val'=>$number,'name'=>$monthNameArr[$number], 'selected'=> $number==date('m')?"selected":"");
  }

  //Формируем массив с годами
  $yearArr = array();
  for ($i=($maxYear==''?date('Y'):$maxYear); $i >= $minYear; $i--) {
      $selected = $i==(date('Y')+$selectedYearOffset) ? 'selected':''; // Отмечаем текущий год добавляя атрибут selected
      $yearArr[] = array('val'=>$i,'name'=>$i,'selected'=>$selected);
  }
  //Формируем HTML структуру
  $output = "<div id=\"dateFilter\"><select name=\"month\">";
  foreach ($monthArr as $month) {
    $output .= '<option value="'.$month['val'].'" '.$month['selected'].'>'.$month['name'].'</option>';
  }
  $output .= "</select><select name=\"year\">";
  foreach ($yearArr as $year) {
    $output .= '<option value="'.$year['val'].'" '.$year['selected'].'>'.$year['name'].'</option>';
  }
  $output .= "</select>";
  $output .="</div>";
  echo $output;
}

dateFilter();
