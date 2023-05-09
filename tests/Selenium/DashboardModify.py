# Test 09: Interact with Dashboard Modify feature

# Import modules for web scripting using Selenium
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.action_chains import ActionChains
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
modifytips_link = driver.find_element(By.LINK_TEXT, 'Modify Tips')
modifytips_link.click()

# Scroll down the results container
time.sleep(2)
results_container = driver.find_element(By.ID, "resultsTableTIPS")
driver.execute_script("arguments[0].scrollTop += 900;", results_container)

# Click the edit button for tip 38
time.sleep(2)
edit_button = driver.find_element(By.XPATH, "//button[contains(@onclick,'openEditModal') and contains(@onclick,'38')]")
edit_button.click()

# Click to close the edit button for tip 38
time.sleep(1)
close_btn = driver.find_element(By.XPATH, "//span[@class='close-btn']")
close_btn.click()

# Click the add tip button
time.sleep(2)
addtip_button = driver.find_element(By.ID, "addTipButton")
addtip_button.click()

# Move the mouse to the element and click outside it to dismiss the prompt
time.sleep(1)
actions = ActionChains(driver)
actions.move_to_element(addtip_button).move_by_offset(0, 100).click().perform()

# Click on the category tab
time.sleep(2)
category_link = driver.find_element(By.XPATH, "//a[@onclick=\"openTab(event, 'Categorie')\"]")
category_link.click()

# Click on the category tab
time.sleep(2)
category_link = driver.find_element(By.XPATH, "//a[@onclick=\"openTab(event, 'Sub-Category')\"]")
category_link.click()

# Close the webdriver
time.sleep(2)
driver.quit()