<!doctype html>
<html lang="lt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Flight Ticket</title>
</head>
<!--DDEV NEVEIKĖ STYLE.CSS O PHPSTORM - NENUSKAITĖ DUOMENŲ, DĖL TO ĮRAŠIAU INCLUDE ČIA, DĖL TECH. PROBLEMŲ-->
<?php include "../data/cities.php"; include "../data/luggage.php"; include "../data/flights.php"; include "../data/prices.php";?>

<?php $date = new DateTime("now", new DateTimeZone('Europe/Vilnius'));?>

<body>

<div class="container">
    <?php if(isset($_POST['save'])){
        if ($_POST['luggageWeight'] > 20) {$lugTax=20;} else {$lugTax=0;}
        $seqArray = array_values($_POST); $seqArray[5] = $seqArray[7]; $seqArray[7] = $seqArray[3] + $lugTax; $seqArray[6] = $lugTax;
//        var_dump($_POST); var_dump($seqArray);
        $lines = file('table.txt'); $i = 0;
        foreach ($lines as $num=>$line)
        {
            echo $line;
            if ($num == 0) {
                echo $date->add(DateInterval::createFromDateString("2 days"))->format("Y-m-d H:i");}
            elseif ($num == 3) {
                echo $date->add(DateInterval::createFromDateString('16 days'))->format('Y-m-d H:i');}
            elseif ($num == 6) {
                echo $_POST['firstName'].' '.$_POST['lastName'];}
            else {
                echo $seqArray[$i]; ++$i;
            }
        }
  }
    ?>

    <h3>FLIGHT PLANNING</h3>
    <form method="post">
        <div class="form-group mb-3">
            <select name="sourceAirport" required class="form-control">
                <option selected disabled value="">--FLYING FROM--</option>
                <?php foreach ($cities as $cID => $cValue):?>
                    <option value="<?=$cValue.' '.strtoupper($cID);?>"><?=$cValue.' '.strtoupper($cID);?></option>
                <?php endforeach;?>
            </select>
        </div>

        <div class="form-group mb-3">
            <select name="destinationAirport" required class="form-control">
                <option selected disabled value="">--FLYING TO--</option>
                <?php foreach ($cities as $cID => $cValue):?>
                    <option value="<?=$cValue.' '.strtoupper($cID);?>"><?=$cValue.' '.strtoupper($cID);?></option>
                <?php endforeach;?>
            </select>
        </div>

        <div class="form-group mb-3">
            <select name="flightNr" required class="form-control">
                <option selected disabled value="">--FLIGHT NUMBER--</option>
                <?php foreach ($flights as $fNr):?>
                    <option value="<?=$fNr;?>"><?=$fNr;?></option>
                <?php endforeach;?>
            </select>
        </div>

        <div class="form-group mb-3">
            <select name="price" required class="form-control">
                <option selected disabled value="">--PRICE--</option>
                <?php foreach ($prices as $fPrice):?>
                    <option value="<?=$fPrice;?>"><?=$fPrice.' eur.';?></option>
                <?php endforeach;?>
            </select>
        </div>

        <div class="form-group mb-3">
            <select name="luggageWeight" required class="form-control">
                <option selected disabled value="">--LUGGAGE WEIGHT--</option>
                <?php foreach ($weight as $lKg):?>
                    <option value="<?=$lKg;?>"><?=$lKg.' Kg';?></option>
                <?php endforeach;?>
            </select>
        </div>

        <div class="form-group mb-3">
            <input type="text" class="form-control" name="firstName" placeholder="--NAME--" required>
        </div>
        <div class="form-group mb-3">
            <input type="text" class="form-control" name="lastName" placeholder="--SURNAME--" required>
        </div>
        <div class="form-group mb-3">
            <input type="text" class="form-control" name="idNumber" placeholder="--PERSONAL ID CODE--" required>
        </div>
        <div class="form-group mb-3">
            <textarea class="form-control" name="notes" rows="3" placeholder="--NOTES--" style="resize: none;"></textarea>
        </div>
        <button class="btn btn-primary" name="save">SUBMIT</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
