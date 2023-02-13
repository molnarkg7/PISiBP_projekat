package jav.qa;

import io.github.bonigarcia.wdm.WebDriverManager;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.edge.EdgeDriver;
import org.testng.annotations.BeforeSuite;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.Test;

import static org.testng.Assert.assertEquals;

public class DodajPonuduPageTest {

    LoginPage loginPage;
    DodajKorisnika add;
    WebDriver driver;
    PretragaPage kontr;

    DodajPonuduPage ponuda;

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
        ponuda = new DodajPonuduPage(driver);

    }

    @Test
    public void DodajPon() {
        loginPage.Login("admin", "admin");
        assertEquals(driver.getCurrentUrl(), "http://localhost:3000/index.php");
        kontr.addkor.click();
        add.aranzman.click();
        ponuda.dodajPonudu("02-13-2023","2230","350","Tokio","Fes","architecture romper","3","Kazablanka","cane cloak","1","Fes","cane cloak","1","Kazablanka","architecture romper","1","Rabat","predisposed float","2","Воз","Lorem ipsum...");

        }
}
