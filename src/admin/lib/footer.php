<script>
    let closeBtn = document.querySelector('#close')
    let openBtn = document.querySelector('#open')
    let navbar = document.querySelector('nav')
    let main = document.querySelector('main')
    
    closeBtn.addEventListener('click', () => {
      
      navbar.classList.remove('left-0');
      navbar.classList.add('left-[-100%]');

      main.classList.remove('ml-72')
      main.classList.add('ml-12')

      openBtn.classList.remove('left-[-100%]');
      openBtn.classList.add('left-0');
    })
    
    openBtn.addEventListener('click', () => {
      
      navbar.classList.add('left-0');
      navbar.classList.remove('left-[-100%]');

      main.classList.remove('ml-12')
      main.classList.add('ml-72')

      openBtn.classList.remove('left-0');
      openBtn.classList.add('left-[-100%]');

      console.log('hehe')

    })

    if(window.innerWidth > 1024) {
      navbar.classList.remove('left-[-100%]');
      navbar.classList.add('left-0');

      main.classList.remove('mr-4');
      main.classList.add('mr-12');
    } else {
      navbar.classList.add('left-[-100%]');
      navbar.classList.remove('left-0');

      main.classList.remove('mr-12');
      main.classList.add('mr-4');
    }

  </script>
</body>
</html>