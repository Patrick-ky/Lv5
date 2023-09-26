@extends('include.header')

@section('title', 'Home')

@section('home')
<div class="center-container">
    <img class="center" src="{{ asset('images/logo-lgu.png') }}" alt="Your Image" style="width: 200px; height: 200px;">
</div>

<div class="container text-center">
    <br>
    <h1>The Local Government Unit Public Market</h1>
    <h3>Rental Billing System with SMS Notification</h3>
</div><br><br>

<div class="inner-content-container">
    <h2 class="text-center">Objectives</h2>
    <p>
        The<strong><i> Rental Billing System</i></strong> is designed to simplify billing monitoring for stall owners in the Public Market of 
        <strong><i>General Santos City</i></strong> by providing automated SMS notifications five days prior their due dates.
    </p>
</div>

<div class="content-container">
    <div class="inner-content-container">
        <h2>Steps</h2>
        <p>
            The steps of adding stalls, stall numbers, clients, and their billings and violations:
        </p>
    </div>


   <div class="row">
    <div class="col-md-6">
        <div class="step-box text-center">
            <h1 style="font-size: 18px;">Step 1</h1>
            <p style="font-size: 14px;">Add <strong>Stall Names</strong> and <strong>Stall Numbers</strong> for each stall.</p>
            <a href="/stall-types">(Go now)</a>
        </div>
        <div class="step-box text-center">
            <h1 style="font-size: 18px;">Step 2</h1>
            <p style="font-size: 14px;">Add <strong>Violations</strong>.</p>
            <a href="/violations">(Go now)</a>
        </div>
        <div class="step-box text-center">
            <h1 style="font-size: 18px;">Step 3</h1>
            <p style="font-size: 14px;">Add <strong>Clients</strong> who become stall owners. <strong>Set their due dates</strong>.</p>
            <a href="/clients">(Go now)</a>
        </div>
    </div>

    <div class="col-md-6">
        <div class="step-box text-center">
            <h1 style="font-size: 18px;">Step 4</h1>
            <p style="font-size: 14px;">Create <strong>Billings</strong>.</p>
            <a href="/billingskie">(Go now)</a>
        </div>
        <div class="step-box text-center">
            <h1 style="font-size: 18px;">Step 5</h1>
            <p style="font-size: 14px;">Track/Monitor <strong>Violations</strong> for stall owners by viewing them.</p>
            <a href="/billingskie">(Go now)</a>
        </div>
        <div class="step-box text-center">
            <h1 style="font-size: 18px;">Step 6</h1>
            <p style="font-size: 14px;">Monitor <strong>Clients</strong> for their payment.</p>
            <a href="/stall-types">(Go now)</a>
        </div>
    </div>
</div>


<style>
.center-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 20vh;
}

.content-container {
    text-align: center;
    width: 100%;
    padding: 20px;
    border: 2px solid #646464;
    background-color: #f8f8f8;
}

.inner-content-container {
    margin: 0 auto;
    max-width: 600px;
}

/* Additional styling for the objectives */
.inner-content-container p {
    margin-bottom: 10px;
}

/* Style for step boxes */
.step-box {
    border: 1px solid #ccc;
    padding: 20px;
    margin-bottom: 20px;
    background-color: #fff;
}

.step-box h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

.step-box p {
    font-size: 16px;
}
</style>

@endsection
