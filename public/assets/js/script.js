document.querySelectorAll('.main-hero__slider-item').forEach(item => {
  item.addEventListener('click', function() {
    const heroId = this.getAttribute('data-hero-id');
    console.log('Hero ID selecionado:', heroId);

    // Remover a classe 'active' de todos os elementos .main-hero__image-item
    const activeImageItem = document.querySelector('.main-hero__image-item.active');
    if (activeImageItem) {
      activeImageItem.classList.remove('active');
      console.log('Removido active de:', activeImageItem);
    }

    // Adicionar a classe 'active' ao .main-hero__image-item correspondente
    const newActiveImageItem = document.querySelector(`.main-hero__image-item[data-hero-id="${heroId}"]`);
    if (newActiveImageItem) {
      newActiveImageItem.classList.add('active');
      console.log('Adicionado active a:', newActiveImageItem);
    } else {
      console.error('Elemento .main-hero__image-item não encontrado para:', heroId);
    }

    // Ocultar todos os itens de conteúdo
    document.querySelectorAll('.main-hero__info-item').forEach(infoItem => {
      infoItem.classList.remove('active'); // Remove a classe active dos itens ocultos
      // Deixe que o CSS lide com a transição
      infoItem.addEventListener('transitionend', function() {
        if (!this.classList.contains('active')) {
          this.style.display = 'none'; // Ocultar elemento após a transição
        }
      }, { once: true });
      console.log('Conteúdo ocultado para:', infoItem);
    });

    // Exibir o conteúdo correspondente
    const contentToShow = document.querySelector(`.main-hero__info-item[data-hero-id="${heroId}"]`);
    if (contentToShow) {
      contentToShow.style.display = 'block'; // Mostrar o elemento antes de adicionar a classe
      requestAnimationFrame(() => {
        contentToShow.classList.add('active'); // Adicionar a classe active para transição suave
      });
      console.log('Exibindo conteúdo para:', heroId, contentToShow);
    } else {
      console.error('Elemento .main-hero__info-item não encontrado para:', heroId);
    }

    // Remove a classe 'active' dos itens do slider e adiciona ao item clicado
    document.querySelectorAll('.main-hero__slider-item').forEach(sliderItem => {
      sliderItem.classList.remove('active');
    });
    this.classList.add('active');
  });
});
