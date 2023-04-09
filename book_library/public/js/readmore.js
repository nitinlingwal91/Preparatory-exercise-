var readMoreButtons = document.querySelectorAll('.read-more');
  
for (var i = 0; i < readMoreButtons.length; i++) {
  readMoreButtons[i].addEventListener('click', function(event) {
    event.preventDefault();
    var description = this.parentNode.querySelector('.description');
    var fullDescription = description.querySelector('.full-description');
    fullDescription.style.display = 'inline';
    this.style.display = 'none';
  });
}