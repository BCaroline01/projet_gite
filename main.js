
///CHECKBOXES////////////

function loadDataAll(data) {

  var httpRequest = new XMLHttpRequest();

  var accommodation = document.getElementsByClassName('accommodation');

  httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState == 4 && httpRequest.status == 200) {

      accommodation[0].innerHTML = httpRequest.response;
      loadDataModal();
    }
  }

  httpRequest.open('POST', 'RequestAll.php');
  httpRequest.send();
}

specChecked();
typeChecked();


function specChecked() {
  var boxChecked = document.getElementsByName('spec[]');
  var arrayChecked = [];

  for (var i = 0; i < boxChecked.length; i++) {
    boxChecked[i].addEventListener('change', function () {
      if (this.checked) {
        arrayChecked.push(this.value);
      } else if (arrayChecked.indexOf(this.value) >= 0) {
        arrayChecked.splice(arrayChecked.indexOf(this.value), 1);
      }
      if(arrayChecked.length == 0){
        loadDataAll();
      }else{
        loadDataSpec(arrayChecked);
      }
    })
  }
}


function typeChecked() {
  var typeBox = document.getElementsByName('type[]');
  var typeArray = [];

  for (var i = 0; i < typeBox.length; i++) {
    typeBox[i].addEventListener('change', function () {
      if (this.checked) {
        typeArray.push(this.value);
      } else if (typeArray.indexOf(this.value) >= 0) {
        typeArray.splice(typeArray.indexOf(this.value), 1);
      } else if (empty(typeBox)) {
        typeArray[0].innerHTML = httpRequest.responce;
      }
      if(typeArray.length == 0){
        loadDataAll();
        
      }else{
        loadDataType(typeArray);
      }
    })
  }
}

function loadDataSpec(data) {

  var httpRequest = new XMLHttpRequest();

  var accommodation = document.getElementsByClassName('accommodation');
      
  httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState == 4 && httpRequest.status == 200) {
      accommodation[0].innerHTML = httpRequest.response;
      loadDataModal();
      
    }
  } 
  
  httpRequest.open('POST', 'RequestSpec.php', true);
  httpRequest.setRequestHeader("Content-Type", "application/json");
  httpRequest.send(JSON.stringify(data));
}

function loadDataType(data) {

  var httpRequest = new XMLHttpRequest();

  var accommodation = document.getElementsByClassName('accommodation');

  httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState == 4 && httpRequest.status == 200) {

      accommodation[0].innerHTML = httpRequest.response;
      loadDataModal();
    }
  }
  
  httpRequest.open('POST', 'RequestType.php', true);
  httpRequest.setRequestHeader("Content-Type", "application/json");
  httpRequest.send(JSON.stringify(data));
}

///MODAL////////////
loadDataModal()

function showModal(t) {

  var modal = document.createElement("div");

  modal.setAttribute("class", "modal");

  var body = document.getElementsByTagName("body");
  body[0].prepend(modal);

  var modalContent = document.createElement("div");
  modalContent.setAttribute("id", "modal-content");
  modalContent.innerHTML = t;
  modal.prepend(modalContent);

  var span = document.createElement("div");
  span.setAttribute("id", "close");
  span.innerHTML = "&times;";
  modalContent.prepend(span);
}

function loadDataModal() {

  var httpRequest = new XMLHttpRequest();

  httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState == 4 && httpRequest.status == 200) {

      let Btn = document.getElementsByClassName('infos');

      for (var i = 0; i < Btn.length; i++) {
        Btn[i].addEventListener('click', function () {
          var value = this.value;
          UpdateData(value);
        });
      }
    } else if (httpRequest.readyState < 4) {
      console.log('Pas ok');
    }
  };
  httpRequest.open('GET', 'modal.php');
  httpRequest.send();
}

function UpdateData(id) {
  var httpRequest = new XMLHttpRequest();
  httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState == 4 && httpRequest.status == 200) {
      showModal(httpRequest.response);
      hideModal('modal', 'close');
    } else if (httpRequest.readyState < 4) {
      console.log('Pas ok');
    }
  };

  httpRequest.open('GET', 'modal.php?id=' + id);
  httpRequest.send();
}


function hideModal(m, c) {
  var closeModal = document.getElementById(c);
  var mo = document.getElementsByClassName(m)[0];
  closeModal.addEventListener('click', function () {
    mo.remove();
  });
}

//Slideshow//////////

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}


function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
 
}

