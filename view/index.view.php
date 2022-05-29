<!doctype html>
<html lang="lt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Flight Ticket</title>
</head>
<!--DDEV VISAI NEVEIKĖ STYLE.CSS O PHPSTORM - NENUSKAITINĖJO DUOMENŲ, DĖL TO ĮRAŠIAU INCLUDE ČIA, NES NEĮMANOMA DIRBTI - SUGAIŠAU TAM DIENĄ-->
<?php include "../data/cities.php"; include "../data/luggage.php"; include "../data/flights.php"; include "../data/prices.php";?>

<?php $date = new DateTime("now", new DateTimeZone('Europe/Vilnius'));?>

<body>

<div class="container">
    <?php if(isset($_POST['save'])){
        if ($_POST['luggageWeight'] > 20) {
            $lugTax=20 and $_POST['price'] +=20;
        } else {
            $lugTax="";
        }
        echo '<br><table class="ticket"><thead><tr><th colspan="20">Check your flight information before flight</th></tr></thead><tbody><tr><td colspan="3" rowspan="3">';
echo $date->add(DateInterval::createFromDateString("2 days"))->format("Y-m-d H:i"); echo '</td><td colspan="2" class="one">From:</td><td colspan="8">';
echo $_POST['sourceAirport']; echo '</td><td colspan="7" class="one two">Additional Information:</td></tr>';echo '<tr><td colspan="2" class="one">To:</td><td colspan="8">';
echo $_POST['destinationAirport']; echo '</td><td colspan="3" class="one two">Return Flight:</td><td colspan="4" class="two">'; echo $date->add(DateInterval::createFromDateString('16 days'))->format('Y-m-d H:i');
echo '</td></tr><tr><td colspan="3" class="one">Flight Number:</td><td colspan="7">'; echo $_POST['flightNr']; echo '</td><td colspan="5" class="one two">Price:</td><td colspan="2" class="two">';
echo $_POST['price']; echo '</td></tr>'; echo '<tr><td colspan="4" class="one">Passenger Name:</td><td colspan="9">'; echo $_POST['firstName'].' '.$_POST['lastName']; echo '</td><td colspan="5" class="one two">Luggage Weight:</td><td colspan="2" class="two">';
echo $_POST['luggageWeight']; echo '</td></tr><tr><td colspan="4" class="one">Passenger ID Number:</td><td colspan="9">'; echo $_POST['idNumber']; echo '</td><td colspan="5" class="one two">Luggage Tax:</td><td colspan="2" class="two">';
echo $lugTax;echo '</td></tr><tr><td colspan="13"></td><td colspan="5" class="one two">Total Price:</td><td colspan="2" class="two">'; echo $_POST['price'] ; echo '</td></tr></tbody></table>';
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
