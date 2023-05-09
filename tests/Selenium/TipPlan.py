# Test 05: Interact with the add tip to plan feature

# Import modules for web scripting using Selenium
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import Select
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.chrome.service import Service
import time

# Set up the webdriver using webdriver_manager
driver_service = Service(ChromeDriverManager().install())
driver = webdriver.Chrome(service=driver_service)
driver.maximize_window()

# Open the webpage
driver.get('https://programmedelic.azurewebsites.net/')

# Find the category dropdown element
time.sleep(1)
category_dropdown = driver.find_element(By.ID, 'category')
category_dropdown.click()

# Select the "Appliances" option by visible text for the category dropdown element
category_select = Select(category_dropdown)
category_select.select_by_visible_text("Appliances")
time.sleep(1)

# Find the subcategory dropdown element
time.sleep(1)
subcategory_dropdown = driver.find_element(By.ID, 'subcategory')
subcategory_dropdown.click()

# Select the "Dishwasher" option by visible text for the subcategory dropdown element
subcategory_select = Select(subcategory_dropdown)
subcategory_select.select_by_visible_text("All Subcategories")
time.sleep(1)

# Submit the form to apply the selected category
submit_button = driver.find_element(By.XPATH, "//input[@type='submit']")
submit_button.click()
time.sleep(1)

# Click on the add to plan button for the first tip showing
time.sleep(2)
addtoplan_button = driver.find_element(By.ID, "atpBtn-1")
addtoplan_button.click()

# Delete the first tip from the tip plan
time.sleep(2)
delete_button = driver.find_element(By.ID, "trashBtn-1")
delete_button.click()

# Close the webdriver
time.sleep(2)
driver.quit()