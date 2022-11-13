let articles = [];	//Массив статей
let postCount = 0;	//Счётчик статей
let articleMax = 5; //Максимальное кол-во статей на экране

class Article {
	constructor(id, title, text) {
   	this.id = id;									//Индентификатор
   	this.title = title;								//Заголовок
   	this.text = text;								//Текст статьи
  }
}
//Добавление новую статью в массив
function addArticle(){
	postCount++;
	let title = "Заголовок №" + (postCount);
	let text = "Тестовый текст статьи " + (postCount);
	articles.push(new Article(postCount, title, text));
}

//Вывод всех статей из массива в HTML
function printArticle(maxArticle=10){
	let count=0;
	let articleHTML="";

	for (let article of articles) {
  		articleHTML +=
  		`	<article id=${article.id}>
  				<button type=button onclick="delArticle(${article.id})">X</button>
				<h2>${article.title}</h2>
				<p>${article.text}</p>
			</article>
  		`;
  		count++;
  		if(count>=maxArticle) break;
	}
	document.getElementById("content").innerHTML=articleHTML;
}

let oldArt; //последняя удаленная статья
//Удаление стаьти из массива по её ID
function delArticle(id){
	console.log("idArticle="+id);
	let itemNum = articles.findIndex(item => item.id == id);
	console.log("itemNum="+itemNum);
	oldArt = articles.splice(itemNum, 1)
	//document.getElementById(id).remove();
	printArticle(articleMax);
}

for (let i = 0; i < 10; i++) {
	addArticle();
}

printArticle(articleMax);

