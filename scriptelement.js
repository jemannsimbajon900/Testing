function showTab(tabId, element) {
  
  const sections = document.querySelectorAll('section.tab');
  sections.forEach(section => section.classList.remove('active'));


  const navItems = document.querySelectorAll('nav ul li');
  navItems.forEach(item => item.classList.remove('active'));

  
  const tab = document.getElementById(tabId);
  if (tab) tab.classList.add('active');

  
  if (element) element.classList.add('active');

  
}
