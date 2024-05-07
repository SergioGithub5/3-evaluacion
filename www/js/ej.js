
// DOM = DOCUMENT OBJECT MODEL
//              Object{} that represents the page you see in the web browser 
//              and provides you with an API to interact with it.
//             Web browser constructs the DOM when it loads an HTML document,
//             and structures all the elements in a tree-like representation.
//             JavaScript can access the DOM to dynamically 
//             change the content, structure, and style of a web page.

console.log(document);
console.dir(document);

document.title = "My website";
document.body.style.backgroundColor = "hsl(0, 0%, 15%)";

const username = "";
const welcomeMsg = document.getElementById("welcome-msg");
welcomeMsg.textContent += username === "" ? `Guest` : username;


// element selectors = Methods used to target and manipulate HTML elements 
//                                     They allow you to select one or multiple HTML elements
//                                     from the DOM (Document Object Model)

// 1. document.getElementById()                 // ELEMENT OR NULL
// 2. document.getElementsClassName()  // HTML COLLECTION
// 3. document.getElementsByTagName() // HTML COLLECTION
// 4. document.querySelector()                    // FIRST ELEMENT OR NULL
// 5. document.querySelectorAll()               // NODELIST

// ---------- getElementById() ----------

const myHeading = document.getElementById("my-heading");
myHeading.style.backgroundColor = "yellow";
myHeading.style.textAlign = "center";

// ---------- getElementsByClassName() ----------

const fruits = document.getElementsByClassName("fruits");

Array.from(fruits).forEach(fruit => {
    fruit.style.backgroundColor = "yellow";
});

// ---------- getElementsByTagName() ----------

const h4Elements = document.getElementsByTagName("h4");
const liElements = document.getElementsByTagName("li");

Array.from(h4Elements).forEach(h4Element => {
    h4Element.style.backgroundColor = "yellow";
});

Array.from(liElements).forEach(liElement => {
    liElement.style.backgroundColor = "lightgreen";
});

// ---------- querySelector() ----------

const element = document.querySelector("li");

element.style.backgroundColor = "yellow";

// ---------- querySelectorAll() ----------

const foods = document.querySelectorAll("li");

foods.forEach(food => {
    food.style.backgroundColor = "yellow"
});