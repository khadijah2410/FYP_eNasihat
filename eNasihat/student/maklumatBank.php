<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Permohonan</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/maklumatBank.css'>

    <style>
        /* Adjust the styling of the pop-up */
        body {
            overflow: hidden; /* Prevent scrolling in the background */
        }

        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #e3e8ec;
            z-index: 9999;
        }

        .form {
            width: clamp(320px, 30%, 430px);
            margin: 0 auto;
            border: none;
            border-radius: 10px !important;
            overflow: hidden;
            padding: 1.5rem;
            background-color: #fff;
            padding: 20px 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .step-forms {
            display: none;
            transform-origin: top;
            animation: animate 1s;
        }

        .step-forms-active {
            display: block;
        }

        .group-inputs {
            margin: 1rem 0;
            position: relative;
        }

        .group-inputs label {
            font-size: 13px;
            position: absolute;
            height: 19px;
            padding: 4px 7px;
            top: -14px;
            left: 10px;
            color: #a2a2a2;
            background-color: white;
        }
    </style>
    
</head>

<body>
<div class="popup">
    <form action="#" class="form" id="forms" onsubmit="event.preventDefault()">


        <div class="progressbar">
            <div class="progress" id="progress"></div>

            <div class="progress-step progress-step-active" data-title="Jenis Bantuan"></div>
            <div class="progress-step" data-title="Maklumat Bank"></div>
            <div class="progress-step" data-title="Perakuan Pemohon"></div>
        </div>
        <!---jenis bantuan-->
        <div class="step-forms step-forms-active">
        <div class="radio-group">
    <div class="radio-option">
      <input type="radio" id="bantuan-umum-pelajaran" name="jenis-bantuan" value="bantuan-umum-pelajaran">
      <label for="bantuan-umum-pelajaran">Bantuan Umum Pelajaran</label>
    </div>

    <div class="radio-option">
      <input type="radio" id="bantuan-musibah" name="jenis-bantuan" value="bantuan-musibah">
      <label for="bantuan-musibah">Bantuan Musibah</label>
    </div>

    <div class="radio-option">
      <input type="radio" id="bantuan-perubatan" name="jenis-bantuan" value="bantuan-perubatan">
      <label for="bantuan-perubatan">Bantuan Perubatan</label>
    </div>

    <div class="radio-option">
      <input type="radio" id="bantuan-mualaf" name="jenis-bantuan" value="bantuan-mualaf">
      <label for="bantuan-mualaf">Bantuan Mualaf</label>
    </div>

    <div class="radio-option">
      <input type="radio" id="bantuan-mobiliti" name="jenis-bantuan" value="bantuan-mobiliti">
      <label for="bantuan-mobiliti">Bantuan Mobiliti</label>
    </div>

    <div class="radio-option">
      <input type="radio" id="bantuan-insentif-kecemerlangan" name="jenis-bantuan" value="bantuan-insentif-kecemerlangan">
      <label for="bantuan-insentif-kecemerlangan">Bantuan Insentif Kecemerlangan</label>
    </div>
  </div>
            
        
            <div class="">
                <a href="#" class="btn btn-next width-50 ml-auto">Seterusnya</a>
            </div>
        </div>
        <div class="step-forms">
            <div class="group-inputs">
                <label>Nama Bank</label>
                <input type="text" name="namaBank" id="namaBank" />
            </div>
            <div class="group-inputs">
                <label for="position">Nombor Akaun</label>
                <input type="text" name="noAkaun" id="noAkaun" />
            </div>
           
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Kembali</a>
                <a href="#" class="btn btn-next">Seterusnya</a>
            </div>
        </div>
        <div class="step-forms">
            <div class="form-check"> 
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" required> 
            <label class="form-check-label" for="flexCheckChecked"> Saya mengakui bahawa semua maklumat yang diberikan adalah benar dan bersetuju menerima sebarang tindakan jika didapati palsu.</label> 
            </div>

            <div class="btns-group">
                <a href="#" class="btn btn-prev">Kembali</a>
                <input type="submit" value="Hantar" id="submit-form" class="mohon_btn"/>
            </div>
        </div>
    </form>
</div>
<script src="js/jquery.min.js"></script>
<script>
const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".step-forms");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;

nextBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        formStepsNum++;
        updateFormSteps();
        updateProgressbar();

    });
});

prevBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        formStepsNum--;
        updateFormSteps();
        updateProgressbar();

    });
});

function updateFormSteps() {
    formSteps.forEach((formStep) => {
        formStep.classList.contains("step-forms-active") &&
            formStep.classList.remove("step-forms-active");
    });

    formSteps[formStepsNum].classList.add("step-forms-active");
}

function updateProgressbar() {
    progressSteps.forEach((progressStep, idx) => {
        if (idx < formStepsNum + 1) {
            progressStep.classList.add("progress-step-active");

        } else {
            progressStep.classList.remove("progress-step-active");

        }
    });

    progressSteps.forEach((progressStep, idx) => {
        if (idx < formStepsNum) {

            progressStep.classList.add("progress-step-check");
        } else {

            progressStep.classList.remove("progress-step-check");
        }
    });

    const progressActive = document.querySelectorAll(".progress-step-active");

    progress.style.width =
        ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}


document.getElementById("submit-form").addEventListener("click", function () {

    progressSteps.forEach((progressStep, idx) => {
        if (idx <= formStepsNum) {

            progressStep.classList.add("progress-step-check");
        } else {

            progressStep.classList.remove("progress-step-check");
        }
    });

    var forms = document.getElementById("forms");
    forms.classList.remove("form");
    forms.innerHTML = '<div class="welcome"><div class="content"><svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg><h3>Permohonan berjaya disimpan!</h3><span>Kami akan hubungi anda dengan segera!</span><div></div>';

}); 

</script>


</body>
</html>
