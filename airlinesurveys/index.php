<!DOCTYPE HTML>
<html>
<title>Bug Report</title>

<head>

</head>

<body>



<h2>airline survey</h2>
<form method="POST" action="surveyreport.php">
    <p>Date of flight <input type="date" name="Date"/></p>
    <p>time of flight <input type="time" name="time"/></p>
    <p>flight number <input type="number" name="flightnumber"/></p>
    <p>airline company <input type="text" name="airlinecompany"/></p>
    <p>airfield <input type="text" name="airfield"/></p>

    <p class="p1"> Question 1</p>
    <p class="p4"> Friendliness of customer staff</p>
    <p class="p3">
        <input type="radio" name="q1" value="no_opinion" />
        No Opinion
        <input type="radio" name="q1" value="poor" />
        Poor
        <input type="radio" name="q1" value="pair" />
        Fair
        <input type="radio" name="q1" value="good" />
        Good
        <input type="radio" name="q1" value="excellent" />
        Excellent </p>
    <br>
    <p class="p1"> Question 2</p>
    <p class="p4"> Space for luggage storage;</p>
    <p class="p3">
        <input type="radio" name="q2" value="no_opinion" />
        No Opinion
        <input type="radio" name="q2" value="poor" />
        Poor
        <input type="radio" name="q2" value="pair" />
        Fair
        <input type="radio" name="q2" value="good" />
        Good
        <input type="radio" name="q2" value="excellent" />
        Excellent </p>
    <br>
    <p class="p1"> Question 3</p>
    <p class="p4"> Comfort of seating</p>
    <p class="p3">
        <input type="radio" name="q3" value="no_opinion" />
        No Opinion
        <input type="radio" name="q3" value="poor" />
        Poor
        <input type="radio" name="q3" value="pair" />
        Fair
        <input type="radio" name="q3" value="good" />
        Good
        <input type="radio" name="q3" value="excellent" />
        Excellent </p>
    <br>
    <p class="p1"> Question 4</p>
    <p class="p4"> Cleanliness of aircraft;</p>
    <p class="p3">
        <input type="radio" name="q4" value="no_opinion" />
        No Opinion
        <input type="radio" name="q4" value="poor" />
        Poor
        <input type="radio" name="q4" value="pair" />
        Fair
        <input type="radio" name="q4" value="good" />
        Good
        <input type="radio" name="q4" value="excellent" />
        Excellent </p>
    <br>
    <p class="p1"> Question 5</p>
    <p class="p4"> Noise level of aircraft.</p>
    <p class="p3">
        <input type="radio" name="q5" value="no_opinion" />
        No Opinion
        <input type="radio" name="q5" value="poor" />
        Poor
        <input type="radio" name="q5" value="pair" />
        Fair
        <input type="radio" name="q5" value="good" />
        Good
        <input type="radio" name="q5" value="excellent" />
        Excellent </p>
    <br>

    <p><input type="submit" value="Submit"/></p>


</form>

<p><a href="surveyresults.php">vieuw past survey results</a></p>


<?php

?>


</body>


</html>