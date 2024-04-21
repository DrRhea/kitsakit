let closeBtn = document.querySelector('#close')
    let openBtn = document.querySelector('#open')
    
    closeBtn.addEventListener('click', () => {
      let navbar = document.querySelector('nav')
      let main = document.querySelector('main')
      
      navbar.classList.remove('left-0');
      navbar.classList.add('left-[-100%]');

      main.classList.remove('ml-72')
      main.classList.add('ml-12')

      openBtn.classList.remove('left-[-100%]');
      openBtn.classList.add('left-0');
    })
    
    openBtn.addEventListener('click', () => {
      let navbar = document.querySelector('nav')
      let main = document.querySelector('main')
      
      navbar.classList.add('left-0');
      navbar.classList.remove('left-[-100%]');

      main.classList.remove('ml-12')
      main.classList.add('ml-72')

      openBtn.classList.remove('left-0');
      openBtn.classList.add('left-[-100%]');

      console.log('hehe')
    })