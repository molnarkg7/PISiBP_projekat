package jav.qa;

import io.github.bonigarcia.wdm.WebDriverManager;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.edge.EdgeDriver;
import org.testng.annotations.BeforeSuite;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.Test;

public class RezervacijaPageTest {

    LoginPage loginPage;
    RezervacijaPage rez;
    WebDriver driver;


    @BeforeSuite
    public void BeforeSuite() {
        WebDriverManager.edgedriver().setup();
    }

    @BeforeTest
    public void BeforeTest() {
        driver = new EdgeDriver();
        driver.navigate().to("http://localhost:3000/rezervacija.php?pon=18042&lok=35");
        rez=new RezervacijaPage(driver);

    }

    @Test
    public void Rezervacija() {
        rez.Rezervacija("Kroki","Krokic","060789675","kroki@gmail.com","4","2","Ludilo ponuda!");

    }

}
