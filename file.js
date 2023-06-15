const toggleMenu = document.querySelector('.toggle-menu');
const nav = document.querySelector('nav');

toggleMenu.addEventListener('click', () => {
  nav.classList.toggle('active');
});
// สร้างตัวแปรให้มาเก็บข้อมูล JSON ของเมนูนี้
let menuItems = {
    "home": "หน้าแรก",
    "about": "เกี่ยวกับเรา",
    "services": "บริการของเรา",
    "contact": "ติดต่อเรา"
  };
  
  // เมื่อหน้าโหลดเสร็จ จะเช็ค localStorage ก่อนว่ามีข้อมูลเมนูที่เก็บไว้หรือไม่
  window.onload = function() {
    if (localStorage.getItem("menuItems")) {
      let storedMenuItems = JSON.parse(localStorage.getItem("menuItems"));
      document.querySelector("nav ul").innerHTML = "";
      for (let key in storedMenuItems) {
        let li = document.createElement("li");
        let a = document.createElement("a");
        a.href = "#" + key;
        a.innerHTML = storedMenuItems[key];
        li.appendChild(a);
        document.querySelector("nav ul").appendChild(li);
      }
    } else {
      for (let key in menuItems) {
        let li = document.createElement("li");
        let a = document.createElement("a");
        a.href = "#" + key;
        a.innerHTML = menuItems[key];
        li.appendChild(a);
        document.querySelector("nav ul").appendChild(li);
      }
      localStorage.setItem("menuItems", JSON.stringify(menuItems));
    }
  }
  