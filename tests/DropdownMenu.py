# Test 02: Navigate the dropdown menu for the webpage

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
driver.set_window_size(1280, 900)

# Open the webpage
driver.get('https://programmedelic.azurewebsites.net/')

# Find the category dropdown element
time.sleep(2)
category_dropdown = driver.find_element(By.ID, 'category')
category_dropdown.click()

# Select the "Appliances" option by visible text for the category dropdown element
category_select = Select(category_dropdown)
category_select.select_by_visible_text("Appliances")
time.sleep(2)

# Find the subcategory dropdown element
time.sleep(2)
subcategory_dropdown = driver.find_element(By.ID, 'subcategory')
subcategory_dropdown.click()

# Select the "Dishwasher" option by visible text for the subcategory dropdown element
subcategory_select = Select(subcategory_dropdown)
subcategory_select.select_by_visible_text("Dishwasher")
time.sleep(2)

# Submit the form to apply the selected category
submit_button = driver.find_element(By.XPATH, "//input[@type='submit']")
submit_button.click()
time.sleep(1)

# Close the webdriver
time.sleep(2)
driver.quit()
