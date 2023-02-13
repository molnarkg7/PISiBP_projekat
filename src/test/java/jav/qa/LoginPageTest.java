package jav.qa;

import io.github.bonigarcia.wdm.WebDriverManager;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.edge.EdgeDriver;
import org.testng.annotations.BeforeSuite;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.Test;

import static org.testng.Assert.*;

public class LoginPageTest {

    LoginPage loginPage;
    WebDriver driver;


    @BeforeSuite
    public void BeforeSuite() {
        WebDriverManager.edgedriver().setup();
    }

    @BeforeTest
    public void BeforeTest() {
        driver = new EdgeDriver();
        driver.navigate().to("http://localhost:3000/login.php");
        loginPage = new LoginPage(driver);
    }


    @Test
    public void testLogin() {
        loginPage.Login("admin", "admin");
        assertEquals(driver.getCurrentUrl(), "http://localhost:3000/index.php");
    }
}