@extends('master')
@section('main-content')
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
  img{
    border-radius: 50%;
    margin: auto;    
   display: block;
  }
  .pad{
  border:thick solid white;
  border-radius: 12px;
  }
  .thank-you-pop p{
  	font-size: 20px;
    margin-bottom: 27px;
   	color:#5C5C5C;
  	padding:10px;
  }
</style>

</head>
  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0">
          <a href="/index" style="color: #51eaea">Home</a>
          <span class="mx-2 mb-0">/</span>
          <strong class="text-black">Service</strong>
        </div>
      </div>
    </div>
  </div>
  <br>
<div class="container">
  <div class="row">
    <div class="col-sm-4 pad" style="background-color:lavender;">
      <br>
      <img class="img-circle ,img-responsive" src="{{URL::asset('/images/service/Blood_Pressure_Measurement.jpg')}}" width="300" height="300">
      <h2 class="w3-wide" style="color: black">Blood Pressure Measurement</h2>
      <button onclick="document.getElementById('pressureArea').style.display='block'" class="btn btn-primary">Read more</button>
      <div id="pressureArea" class="w3-modal">
        <div class="w3-modal-content">
          <div class="w3-container thank-you-pop">
            <button type="button" class="close" data-dismiss="modal" onclick="document.getElementById('pressureArea').style.display='none'"><span style="font-size: 40px; color: red">x</span></button>
            <div class="row" style="text-align: center">
              <div class="col-sm-12">
                <h1 style="color: black">Blood Pressure Measurement</h1>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <img class="img-circle ,img-responsive" src="{{URL::asset('/images/service/Blood_Pressure_Measurement.jpg')}}" width="300" height="300">
              </div>
              <div class="col-sm-8"  style="font-size: 20px;">
                <p style="color: black"><b>The five blood pressure ranges are:</b></p>
                <ul>
                  <li><b>Normal:</b>  Blood pressure numbers of less than 120/80 mm Hg.</li>
                  <li><b>Elevated:</b>  Readings consistently range from 120-129 systolic and less than 80 mm Hg diastolic.</li>
                  <li><b>Hypertension Stage 1:</b>  Blood pressure consistently ranges from 130-139 systolic or 80-89 mm Hg diastolic.</li>
                  <li><b>Hypertension Stage 2:</b>  Blood pressure consistently ranges at 140/90 mm Hg or higher.</li>
                  <li><b>Hypertensive Crisis:</b>  Blood pressure consistently ranges at 180/120 mm Hg or higher.</li>
                </ul>
              </div>
            </div> 
          </div>
        </div>
      </div>
      <br>
      <p></p>
    </div>
    <div class="col-sm-4 pad" style="background-color:lavender;">
      <br>
      <img class="img-circle ,img-responsive" src="{{URL::asset('/images/service/Height_&_Weight_Scales.jpg')}}" width="300" height="300">
      <h2 class="w3-wide" style="color: black">Height & Weight Scales</h2>
      <button onclick="document.getElementById('heightArea').style.display='block'" class="btn btn-primary">Read more</button>
      <div id="heightArea" class="w3-modal">
        <div class="w3-modal-content">
          <div class="w3-container thank-you-pop">
            <button type="button" class="close" data-dismiss="modal" onclick="document.getElementById('heightArea').style.display='none'"><span style="font-size: 40px; color: red">x</span></button>
            <div class="row" style="text-align: center">
              <div class="col-sm-12">
                <h1 style="color: black">Height & Weight Scales</h1>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <img class="img-circle ,img-responsive" src="{{URL::asset('/images/service/Height_&_Weight_Scales.jpg')}}" width="300" height="300">
              </div>
              <div class="col-sm-8"  style="font-size: 20px;">
                <p>We help you to know your height and weight then offer Standardized and customized trainings.</p>
              </div>
            </div> 
          </div>
        </div>
      </div>
      <br>
      <p></p>
    </div>
    <div class="col-sm-4 pad" style="background-color:lavender;">
      <br>
      <img class="img-circle ,img-responsive" src="{{URL::asset('/images/service/Blood_Glucose_Testing.jpg')}}" width="300" height="300">
      <h2 class="w3-wide" style="color: black">Blood Glucose Testing</h2>
      <button onclick="document.getElementById('sugarArea').style.display='block'" class="btn btn-primary">Read more</button>
      <div id="sugarArea" class="w3-modal">
        <div class="w3-modal-content">
          <div class="w3-container thank-you-pop">
            <button type="button" class="close" data-dismiss="modal" onclick="document.getElementById('sugarArea').style.display='none'"><span style="font-size: 40px; color: red">x</span></button>
            <div class="row" style="text-align: center">
              <div class="col-sm-12">
                <h1 style="color: black">Blood Glucose Testing</h1>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <img class="img-circle ,img-responsive" src="{{URL::asset('/images/service/Blood_Glucose_Testing.jpg')}}" width="300" height="300">
              </div>
              <div class="col-sm-8"  style="font-size: 20px;">
                <h2 style="color: black">When To Get Tested?</h2>
                <p>When you are older than 45 years or have risk factors for diabetes.</p>
                <h2 style="color: black">Blood Sugar Testing:</h2>
                <ul>
                  <li>Provides information that can be useful for managing diabetes.</li>
                  <li>Helps determine the effects of diabetes medications on your blood sugar.</li>
                  <li>Reveal information on the effects of exercise, diet or stress on your blood sugar levels.</li>
                </ul>
              </div>
            </div> 
          </div>
        </div>
      </div>
      <br>
      <p></p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4 pad" style="background-color:lavender;">
      <br>
      <img class="img-circle ,img-responsive" src="{{URL::asset('/images/service/Temperature_Measurement.jpg')}}" width="300" height="300">
      <h2 class="w3-wide" style="color: black">Temperature Measurement</h2>
      <button onclick="document.getElementById('temperatureArea').style.display='block'" class="btn btn-primary">Read more</button>
      <div id="temperatureArea" class="w3-modal">
        <div class="w3-modal-content">
          <div class="w3-container thank-you-pop">
            <button type="button" class="close" data-dismiss="modal" onclick="document.getElementById('temperatureArea').style.display='none'"><span style="font-size: 40px; color: red">x</span></button>
            <div class="row" style="text-align: center">
              <div class="col-sm-12">
                <h1 style="color: black">Temperature Measurement</h1>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <img class="img-circle ,img-responsive" src="{{URL::asset('/images/service/Temperature_Measurement.jpg')}}" width="300" height="300">
              </div>
              <div class="col-sm-8" style="font-size: 20px;">
                <h3 style="color: black">The normal human body temperature range is typically stated as 36.5–37.5 °C (97.7–99.5 °F).</h3>
                <h3 style="color: black">Human body temperature is variable and dependent upon:</h3>
                <ul>
                  <li>One's sex.</li>
                  <li>Age.</li>
                  <li>Time of day.</li>
                  <li>Exertion level.</li>
                  <li>Health status.</li> 
                  <li>The location in/on the body in which the measurement is being taken.</li> 
                  <li>The subject's state of consciousness (waking, sleeping or sedated).</li>
                  <li>Emotional state.</li>
                </ul>
              </div>
            </div> 
          </div>
        </div>
      </div>
      <br>
      <p></p>
    </div>
    <div class="col-sm-4 pad " style="background-color:lavender;">
      <br>
      <img class="img-circle ,img-responsive" src="{{URL::asset('/images/service/Weight_Management.jpg')}}" width="300" height="300">
      <h2 class="w3-wide" style="color: black">Weight Management</h2>
      <button onclick="document.getElementById('weightArea').style.display='block'" class="btn btn-primary">Read more</button>
      <div id="weightArea" class="w3-modal">
        <div class="w3-modal-content">
          <div class="w3-container thank-you-pop">
          <button type="button" class="close" data-dismiss="modal" onclick="document.getElementById('weightArea').style.display='none'"><span style="font-size: 40px; color: red">x</span></button>
          <div class="row" style="text-align: center">
            <div class="col-sm-12">
              <h1 style="color: black">Weight Management</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <img class="img-circle ,img-responsive" src="{{URL::asset('/images/service/Weight_Management.jpg')}}" width="300" height="300">
            </div>
            <div class="col-sm-8"  style="font-size: 20px;">
              <p>We offer 12 months of support with regular one to one individual appointments with a dietitian alongside work with a cognitive behaviour therapist, physiotherapist and therapy assistant led group education and activity sessions where required.</p>
            </div>
          </div> 
          </div>
        </div>
      </div>
      <br>
      <p></p>
    </div>
    <div class="col-sm-4 pad " style="background-color:lavender;"><br>
      <img class="img-circle ,img-responsive" src="{{URL::asset('/images/service/Needle_&_Syringe_Exchange.png')}}" width="300" height="300">
      <h2 class="w3-wide" style="color: black">Needle & Syringe Exchange</h2>
      <button onclick="document.getElementById('needleArea').style.display='block'" class="btn btn-primary">Read more</button>
      <div id="needleArea" class="w3-modal">
        <div class="w3-modal-content">
          <div class="w3-container thank-you-pop">
            <button type="button" class="close" data-dismiss="modal" onclick="document.getElementById('needleArea').style.display='none'"><span style="font-size: 40px; color: red">x</span></button>
            <div class="row" style="text-align: center">
              <div class="col-sm-12">
                <h1 style="color: black">Needle & Syringe Exchange</h1>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <img class="img-circle ,img-responsive" src="{{URL::asset('/images/service/Needle_&_Syringe_Exchange.png')}}" width="300" height="300">
              </div>
              <div class="col-sm-8"  style="font-size: 20px;">
                <p>It is designed to reduce the spread of blood borne viruses by providing free, sterile injecting equipment and by disposing of used equipment safely.</p>
                <p>We also supply other equipment to prepare and consume drugs such as filters, mixing containers and sterile water and also provide ways to dispose used needles safely.</p>
              </div>
            </div> 
          </div>
        </div>
      </div>
      <br>
      <p></p>
    </div>
  </div>
</div>
@endsection