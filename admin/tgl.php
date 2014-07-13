
<?php
    class waktu {       
        function frmDate($date,$code){
            $explode = explode("-",$date);
            $year  = $explode[0];
            (substr($explode[1],0,1)=="0")?$month=str_replace("0","",$explode[1]):$month=is_string($explode[1]);
            $dated = $explode[2];
            $explode_time = explode(" ",$dated);
            $dates = $explode_time[0];       
           
            switch($code){
                // Per Object
                case 4: $format = $dates; break;                                                            // 01
                case 5: $format = $month; break;                                                            // 01
                case 6: $format = $year; break;                                                                // 2011
            }       
            return $format;
        }   
        function now($code=1){
            switch($code){
                case 1: $date = date("Y-m-d H:i:s"); break;
                case 2: $date = date("Y-m-d"); break;
                case 3: $date = date("H:i:s"); break;
            }
            return $date;
        }
        function nmonth($month){
            $thn_kabisat = date("Y") % 4;
            ($thn_kabisat==0)?$feb=29:$feb=28;
            $init_month = array(1=>31,    // Januari [current]
                                2=>$feb,    // Feb
                                3=>31,    // Mar
                                4=>30,    // Apr
                                5=>31,    // Mei
                                6=>30,    // Juni
                                7=>31,    // Juli
                                8=>31,    // Aug
                                9=>30,    // Sep
                                10=>31,    // Oct   
                                11=>30,    // Nov
                                12=>31);// Des
            $nmonth = $init_month[$month];
            return $nmonth;
        }
        function dateRange($start,$end){
            $xdate    =$this->frmDate($start,4);
            $ydate    =$this->frmDate($end,4);
            $xmonth    =$this->frmDate($start,5);
            $ymonth    =$this->frmDate($end,5);
            $xyear    =$this->frmDate($start,6);
            $yyear    =$this->frmDate($end,6);
            if($xyear==$yyear){
                if($xmonth==$ymonth){
                    $nday=$ydate+1-$xdate;
                } else {
                    $r2=NULL;
                    $nmonth = $ymonth-$xmonth;           
                    $r1 = $this->nmonth($xmonth)-$xdate+1;
                    for($i=$xmonth+1;$i<$ymonth;$i++){
                        $r2 = $r2+$this->nmonth($i);
                    }
                    $r3 = $ydate;
                    $nday = $r1+$r2+$r3;
                }
            } else {
                // Last Year
                //get_nDay
                $r2=NULL; $r3=NULL;
                $r1=$this->nmonth($xmonth)-$xdate+1;
                //get_nMonth
                for($i=$xmonth+1;$i<13;$i++){
                    $r2 = $r2+$this->nmonth($i);
                }
                // Current Year
                for($i=1;$i<$ymonth;$i++){
                    $r3 = $r3+$this->nmonth($i);
                }
                $r4 = $ydate;
                $nday = $r1+$r2+$r3+$r4;
            }           
            return $nday." Hari";
        }
        function deadline($date){
            $now = $this->now();
            $yDate = $this->frmDate($date,6);
            $mDate = $this->frmDate($date,5);
            $dDate = $this->frmDate($date,4);
            $yNow = $this->frmDate($now,6);
            $mNow = $this->frmDate($now,5);
            $dNow = $this->frmDate($now,4);
            $deadmsg = "Telah lewat";
            // cek tahun
            if($yDate>$yNow){
                return $this->dateRange($now,$date);
            } elseif($yDate==$yNow){
                // cek bulan
                if($mDate>$mNow){
                    return $this->dateRange($now,$date);
                } elseif($mDate==$mNow){
                    // cek hari
                    if($dDate>=$dNow){
                        return $this->dateRange($now,$date);
                    } else {
                        return $deadmsg;
                    }
                } else {
                    return $deadmsg;
                }
            } else {
                return $deadmsg;
            }
        }       
    }?>

