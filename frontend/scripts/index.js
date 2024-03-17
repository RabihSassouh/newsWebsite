let newsList=$('#newsList');

function displayNews() {
  $.ajax({
    url: "http://localhost/newswebsite/backend/displayNews.php",
    type: "GET",
    dataType: "json",

    success: (news) => {
      newsList.empty();
      $.each(news, function(index, article) {
        newsList.append(`<li><strong>${article.title}</strong>: ${article.text}</li>`);
    });    
    },
    error: (error) => console.error(error)
        
  });
}
displayNews();