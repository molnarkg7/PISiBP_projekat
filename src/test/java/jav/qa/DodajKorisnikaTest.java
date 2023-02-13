package jav.qa;

import io.github.bonigarcia.wdm.WebDriverManager;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.edge.EdgeDriver;
import org.testng.annotations.BeforeSuite;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.Test;

import static org.testng.Assert.assertEquals;

public class DodajKorisnikaTest {

    LoginPage loginPage;
    DodajKorisnika add;
    WebDriver driver;

    PretragaPage kontr;

    @BeforeSuite
    public void BeforeSuite() {
        WebDriverManager.edgedriver().setup();
    }

    @BeforeTest
    public void BeforeTest() {
        driver = new EdgeDriver();
        driver.navigate().to("http://localhost:3000/login.php");
        add=new DodajKorisnika(driver);
        loginPage = new LoginPage(driver);
        kontr = new PretragaPage(driver);

    }

    @Test
    public void DodajKor() {
        loginPage.Login("admin", "admin");
        assertEquals(driver.getCurrentUrl(), "http://localhost:3000/index.php");
        kontr.addkor.click();
        add.dodajKorisnika("Milance","Milan","Mikic","miki@gmail.com","1234","069234854","Радник");
    }


}
