# Test 08: Interact Dashboard Telemetry feature

# Import modules for web scripting using Selenium
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.action_chains import ActionChains
from selenium.webdriver.support.ui import Select
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.chrome.service import Service
import time

# Set up the webdriver using webdriver_manager
driver_service = Service(ChromeDriverManager().install())
driver = webdriver.Chrome(service=driver_service)
driver.maximize_window()

# Open the webpage
driver.get('https://programmedelic.azurewebsites.net/dashboard/')

# Click on the telemetry tab
time.sleep(2)
telemetry_link = driver.find_element(By.LINK_TEXT, 'Telemetry')
telemetry_link.click()

# Click on the tips details dropdown button
time.sleep(2)
tip_details_button = driver.find_element(By.XPATH, "//button[contains(text(), 'Tip Details')]")
tip_details_button.click()

# Click on the first option in the tips details dropdown menu
time.sleep(2)
tip_details = driver.find_element(By.PARTIAL_LINK_TEXT, 'Use smart strips')
tip_details.click()

# Scroll down the webpage
time.sleep(1)
driver.execute_script("window.scrollBy(0, 1200)")

# Click on the comment link to see comments
time.sleep(2) 
link = driver.find_element(By.ID, "myLink1")
link.click()

# Move the mouse to the element and click outside it to dismiss the prompt
time.sleep(1)
actions = ActionChains(driver)
actions.move_to_element(link).move_by_offset(0, 100).click().perform()

# Click the next button to see the next page of tip information
time.sleep(2) 
next_button = driver.find_element(By.ID, "myTable_next")
next_button.click()
time.sleep(1)

# Click the previous button to go back to the previous page of tip information
time.sleep(2) 
previous_button = driver.find_element(By.ID, "myTable_previous")
previous_button.click()
time.sleep(1)

# Select the option with value "50"
select_element = driver.find_element(By.NAME, "myTable_length")
select = Select(select_element)
select.select_by_value("50")

# Scroll down the webpage
time.sleep(1)
driver.execute_script("window.scrollBy(0, 1200)")

# Close the webdriver
time.sleep(2)
driver.quit()
