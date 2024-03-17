let newsList=$('#newsList');
let addNewsTitle = $('#addNewsTitle');
let addNewsText = $('#addNewsText');
let addNews= $('#addNews');

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


addNews.click(function() {
    let title=addNewsTitle.val();
    let text=addNewsText.val();

    $.ajax({
        url: 'http://localhost/newswebsite/backend/addNews.php',
        type: 'POST',
        data: { title: title, text: text },
        dataType:'json',
        success: function(response) {
            
            if (response.success) {
                displayNews();
                addNewsTitle.val('');
                addNewsText.val('');
            } else {
                console.error("Error: " + response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error: ", status, error);
            console.log(xhr.responseText);
        }
        
    });
});