<? 
$cars= array("Volvo","Maruti","Audi","BMW","Merc");
print_r($cars);

for($j = 0; $j < count($cars); $j ++) {
    for($i = 0; $i < count($cars)-1; $i ++){

        if($cars[$i] > $cars[$i+1]) {
            $temp = $cars[$i+1];
            $cars[$i+1]=$cars[$i];
            $cars[$i]=$temp;
        }       
    }
}
print_r($cars);

?>