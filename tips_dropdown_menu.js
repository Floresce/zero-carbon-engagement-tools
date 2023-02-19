const categorySelect = document.getElementById("category");
const subcategorySelect = document.getElementById("subcategory");
const subcategories = {
  'All Categories': ["All Subcategories", "Smart Home", "Habit Changing", 
  "Washer & Dryer", "Dishwasher", "Refrigerator", "Electric Vehicles", 
  "Appliances", "Maintenance", "Insulation & Sealing", "Pools & Spas", 
  "Thermostat", "Fans", "Sealing", "N/A"],

  'Appliances': ["All Subcategories", "Smart Home", "Habit Changing", "Washer & Dryer", 
  "Dishwasher", "Refrigerator", "N/A"],

  'Around town': ["All Subcategories", "Habit Changing", "Electric Vehicles", "N/A"],

  'Around your home': ["All Subcategories", "Appliances", "Maintenance", "Insulation & Sealing", 
  "Habit Changing", "Sealing", "Pools & Spas"],

  'Cooking': ["Habit Changing"],

  'Heating & Cooling': ["All Subcategories", "Thermostat", "Fans", 
  "Maintenance", "Appliances"],
  
  'On Vacation': ["Habit Changing"]
};

categorySelect.addEventListener("change", () => {
  const selectedCategory = categorySelect.value;
  subcategorySelect.innerHTML = "";
  subcategories[selectedCategory].forEach(category => {
    const option = document.createElement("option");
    option.value = category;
    option.textContent = category;
    subcategorySelect.appendChild(option);
  });
}); 