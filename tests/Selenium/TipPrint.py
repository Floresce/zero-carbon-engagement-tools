# Test 06: Interact with the add tip to plan feature

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

# Click on the add to plan button for the first tip
time.sleep(2)
addtoplan_button = driver.find_element(By.ID, "atpBtn-1")
addtoplan_button.click()

# Scroll to the next tip containing an add to plan button
time.sleep(1)
driver.execute_script("window.scrollBy(0, 1200)")

# Click on the add to plan button for the second tip
time.sleep(2)
addtoplan_button_2 = driver.find_element(By.ID, "atpBtn-3")
addtoplan_button_2.click()

# Scroll to the next tip containing an add to plan button
time.sleep(1)
driver.execute_script("window.scrollBy(0, 600)")

# Click on the add to plan button for the third tip
time.sleep(2)
addtoplan_button_4 = driver.find_element(By.ID, "atpBtn-4")
addtoplan_button_4.click()

# Click on the print button to download a PDF showing tips saved in the plan
time.sleep(2)
print_button = driver.find_element(By.ID, "printBtn")
print_button.click()
time.sleep(2)

# Close the webdriver
time.sleep(2)
driver.quit()
