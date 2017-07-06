$('.gallery-inner').isotope({
  itemSelector: '.item',
  masonry: {
    columnWidth: '.grid-sizer',
    gutter: 1
  }
}).isotope('layout');



$('.gallery-inner .item').on('click', function(event){
  event.stopPropagation();
  
  var nbrArticles = $('.item').length;
  var clickedArticle = $(this);
  var thisIndex = $(this).index();
  var clickedArticleNext = $(this).next('.item');
  var clickedArticlePrev = $(this).prev('.item');
  
  console.log('The article : ');
  console.log(clickedArticle);
  
  imgToShow = clickedArticle.find('img').attr('src');
  articleLink = clickedArticle.data('article');
  articleData = $('#article-contents').find('.article-html[data-article="'+articleLink+'"]').html();
  articleTitle = clickedArticle.find('.desc h4').html();
  i = clickedArticle.index()+1;
  var n=1;
  

  
  changeArticle();
  
  $('.next-btn').click(function(event){
      event.stopPropagation();
        

 
        var clickedArticle = $('.item:eq('+(i)+')');

        console.log('New article ' + i + ' : ');
        console.log(clickedArticle);
        imgToShow = clickedArticle.find('img').attr('src');
        articleLink = clickedArticle.data('article');
        articleData = $('#article-contents').find('.article-html[data-article="'+articleLink+'"]').html();
        articleTitle = clickedArticle.find('.desc h4').html();

      if(i>= $('.item').length-1){
       
        i=0;
      }else{
        
        i++;
      }
    

        
      changeArticle();
    
     
  });

  $('.prev-btn').click(function(event){
      event.stopPropagation();
   
        
        var clickedArticle = $('.item:eq('+i+')');
        console.log('New article ' + i + ' : ');
        console.log(clickedArticle);
        imgToShow = clickedArticle.find('img').attr('src');
        articleLink = clickedArticle.data('article');
        articleData = $('#article-contents').find('.article-html[data-article="'+articleLink+'"]').html();
        articleTitle = clickedArticle.find('.desc h4').html();

      if(i < 1){
        i= ($('.item').length);
      }else{
        i --;
      }
        
      changeArticle();
  });  
  

 function changeArticle() {
    
    $('.project-container').hide();
   
    $('.project-view .project-article-header').css({
      'background' : 'url('+imgToShow+') no-repeat top fixed'
    });

    $('.project-view .project-article-content').html('<div class="appended-data">'+articleData+'</div>');
    $('.project-article-header').html('<div class="project-article-title"><h1>'+articleTitle+'</h1></div>'); 
   
    $('.project-container').fadeIn(500);
 }

  

  
  if(!$('body').hasClass('article-opened')){
      
    $('body').addClass('article-opened');


    
  }else{
    
    $('body').removeClass('article-opened');
   
  }
  
  
});

$('.project-view').on('click', function(event){
  event.stopPropagation();
});


$('html, body, .overlay, .close').on('click', function(){
  $('body').removeClass('article-opened');
  var i = 0;
});