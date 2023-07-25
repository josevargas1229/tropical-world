<div class="container-homeview">
  <section id="container-slider">
    <a href="#" class="arrowPrev"><i class="fas fa-chevron-circle-left"></i></a>
    <a href="#" class="arrowNext"><i class="fas fa-chevron-circle-right"></i></a>
    <ul class="listslider">
      <li><a itlist="itList_0" href="#" class="item-select-slid"></a></li>
      <li><a itlist="itList_1" href="#"></a></li>
      <li><a itlist="itList_2" href="#"></a></li>
    </ul>
    <ul id="slider">
      <li style="background-image: url('src/img/project/1.png'); z-index:0; opacity: 1;">
        <div class="content_slider">
          <div>
            <h2>Sabor extraordinario</h2>
            <p>La cajeta de mango es un producto artesanal y delicioso que deleitará el paladar con su inigualable sabor tropical.</p>
          </div>
        </div>
      </li>
      <li style="background-image: url('src/img/project/2.jpg'); ">
        <div class="content_slider">
          <div>
            <h2>Calidad</h2>
            <p>Elaborado con mangos locales de alta calidad, ofrece una extraordinaria experiencia gustativa.</p>
          </div>
        </div>
      </li>
      <li style="background-image: url('src/img/project/3.jpg'); ">
        <div class="content_slider">
          <div>
            <h2>Único</h2>
            <p>Los consumidores pueden disfrutar de la frescura y de la esencia de los mangos de la región en cada bocado.</p>
          </div>
        </div>
      </li>
    </ul>
  </section>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
    var arrowPrev = document.querySelector('.arrowPrev');
    var arrowNext = document.querySelector('.arrowNext');

    if (arrowPrev && arrowNext) {
      arrowPrev.addEventListener('click', function(e) {
        e.preventDefault();
        funcionEjecutar('anterior');
      });

      arrowNext.addEventListener('click', function(e) {
        e.preventDefault();
        funcionEjecutar('siguiente');
      });
    }
});
    if (document.querySelector('#container-slider')) {
      setInterval(function() {
        funcionEjecutar('siguiente');
      }, 5000);
    }
    
    //------------------------------ LIST SLIDER -------------------------
    if (document.querySelector('.listslider')) {
      let links = document.querySelectorAll(".listslider li a");
      links.forEach(function(link) {
        link.addEventListener('click', function(e) {
          e.preventDefault();
          let item = this.getAttribute('itlist');
          let arrItem = item.split("_");
          funcionEjecutar(arrItem[1]);
          return false;
        });
      });
    }

    function funcionEjecutar(side) {
      let parentTarget = document.getElementById('slider');
      let elements = parentTarget.getElementsByTagName('li');
      let curElement, siguienteElement;
      for (var i = 0; i < elements.length; i++) {
        if (elements[i].style.opacity == 1) {
          curElement = i;
          break;
        }
      }
      if (side == 'anterior' || side == 'siguiente') {
        if (side == "anterior") {
          siguienteElement = (curElement == 0) ? elements.length - 1 : curElement - 1;
        } else {
          siguienteElement = (curElement == elements.length - 1) ? 0 : curElement + 1;
        }
      } else {
        siguienteElement = side;
        side = (curElement > siguienteElement) ? 'anterior' : 'siguiente';
      }

      //PUNTOS INFERIORES
      let elementSel = document.getElementsByClassName("listslider")[0].getElementsByTagName("a");
      elementSel[curElement].classList.remove("item-select-slid");
      elementSel[siguienteElement].classList.add("item-select-slid");
      elements[curElement].style.opacity = 0;
      elements[curElement].style.zIndex = 0;
      elements[siguienteElement].style.opacity = 1;
      elements[siguienteElement].style.zIndex = 1;
    }
  </script>
</div>
