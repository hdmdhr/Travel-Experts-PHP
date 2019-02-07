// --- Forms on Home & Register Pages ---

var title = document.querySelector('title').text;

switch (title) {
  case 'Travel Experts':
    $('.home')[0].classList.add('nav-tab-current');
    break;
  case 'Contact Us':
    $('.contact')[0].classList.add('nav-tab-current');
    break;
  case 'Register':
    $('.register')[0].classList.add('nav-tab-current');
    break;
  case 'Famous Spots':
    $('.spots')[0].classList.add('nav-tab-current');
    break;
  case 'Links':
    $('.links')[0].classList.add('nav-tab-current');
    break;
  case 'Add New Agent':
    $('.add-agent')[0].classList.add('nav-tab-current');
    break;
  default:
    break;
}

if (title === 'Travel Experts' || title === 'Register') {
  console.log('this is home page or register page.');
  var form = document.registerForm;
  console.log(form);

  // Feature 1: Ask user to confirm after click sumbit & reset
  // Feature 2: Validate the form before submit

  form.addEventListener('submit', function(event) {
    if (confirm('Ready to submit?')) {
      event.preventDefault();

      // reset error messages to hidden
      document.getElementById('errorName').style.display = 'none';
      document.getElementById('errorEmail').style.display = 'none';
      document.getElementById('errorAge').style.display = 'none';
      document.getElementById('errorZip').style.display = 'none';
      $('input').removeClass('invalid-input');

      // check if user filled zip, age, email, name info, if not, show error message

      var isValidated = true;

      if (!form.zip.value) {
        form.zip.focus();
        $('#errorZip').css('display', 'block');
        $('#zip').addClass('invalid-input');
        isValidated = false;
      }
      if (age.value < 18) {
        form.age.focus();
        $('#errorAge').css('display', 'block');
        $('#age').addClass('invalid-input');
        isValidated = false;
      }
      if (!form.email.value) {
        form.email.focus();
        $('#errorEmail').css('display', 'block');
        $('#email').addClass('invalid-input');
        isValidated = false;
      }
      if (!form.name.value) {
        form.name.focus();
        $('#errorName').css('display', 'block');
        $('#name').addClass('invalid-input');
        isValidated = false;
      }
      if (isValidated) {
        form.submit();
      }
    }
  });

  form.resetBtn.addEventListener('click', function(event) {
    if (confirm('This will reset all your infomation.')) {
      form.reset();
      event.preventDefault();
      form.name.focus();
    }
  });

  // Feature 3: Focus & blur on text field to show & hide description text

  var allDescriptions = document.querySelectorAll('.input-hint-hidden');

  for (i = 0; i < allDescriptions.length; i++) {

    var description = allDescriptions[i];

    // check if the previous element is text field, if yes, add focus & blur event listener to it

    if (description.previousElementSibling.tagName === 'INPUT' || 'TEXTAREA') {

      var input = description.previousElementSibling;

      input.addEventListener('focus', function(event) {
        this.nextElementSibling.className = "input-hint-show";
      });

      input.addEventListener('blur', function(event) {
        this.nextElementSibling.className = 'input-hint-hidden';
      });

    }
  }

  // Feature 4(extra): mouseover side bar to show corresponding content

  $('aside ul li').mouseover(function(event) {
    $('aside ul li').css('background-color', 'RGBA(189, 183, 107, 0.25)');
    this.style.backgroundColor = 'RGBA(189, 183, 107, 0.75)';
    switch (this.textContent) {
      case 'See Gallery':
        $('.hide').css('display', 'none');
        $('#carousel').css('display', 'block');
        break;
      case 'Register Now':
        $('.hide').css('display', 'none');
        $('#form').css('display', 'block');
        break;
      case 'Contact Us':
        $('.hide').css('display', 'none');
        $('#table').css('display', 'table');
        break;
    }
  });

}

// --- Image Table on Famous Spots Page ---

if (title === 'Famous Spots') {

  console.log('This is Famous Spots page.');

  var spotsTable = {
    image: [
      'img/Australia.jpg',
      'img/Canada.jpg',
      'img/China.jpg',
      'img/Japan.jpg',
      'img/US.jpg'
    ],
    description: [
      'Photo was taken in Australia.',
      'Spectacular Canadian Rocky Mountain.',
      'Landscape of ZhangJiaJie in China.',
      'Japanese temple surronded by maples.',
      'Beautiful sunset in the US.'
    ],
    url: [
      'https://www.skydive.com.au/',
      'http://banffandbeyond.com/',
      'https://www.chinahighlights.com/zhangjiajie/',
      'https://www.japan-guide.com/',
      'https://www.visittheusa.ca/'
    ]
  };

  $('.spots-table').append('<table class="table"><thead><tr><th colspan="2">Hot Spots Photos</th></tr></thead></table>');

  var table = document.querySelector('.table');

  for (i = 0; i < spotsTable.image.length; i++) {
    // append image & description to td, add click event listener to image
    var img = document.createElement('img');
    img.src = spotsTable.image[i];
    img.href = spotsTable.url[i];
    img.addEventListener('click', function(event) {
      var newWindow = window.open(this.href);
      setTimeout(() => {
        newWindow.close();
      }, 2500);
    });
    var td1 = document.createElement('td');
    td1.appendChild(img);
    var td2 = document.createElement('td');
    td2.innerHTML = `<p>${spotsTable.description[i]}</p>`;

    // append td to tr
    var tr = document.createElement('tr');
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.firstChild.style.width = '50%';
    tr.lastChild.style.width = '50%';

    // append tr to table
    table.appendChild(tr);
  }


}
