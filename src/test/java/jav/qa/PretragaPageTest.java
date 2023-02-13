package jav.qa;

import io.github.bonigarcia.wdm.WebDriverManager;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.edge.EdgeDriver;
import org.testng.annotations.BeforeSuite;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.Test;

import static org.testng.Assert.assertEquals;

public class PretragaPageTest {

    LoginPage loginPage;
    PretragaPage pocetnaStrana;
    WebDriver driver;

    @BeforeSuite
    public void BeforeSuite(){
        WebDriverManager.edgedriver().setup();
    }

    @BeforeTest
    public void BeforeTest(){
        driver=new EdgeDriver();
        driver.navigate().to("http://localhost:3000/index.php");
        pocetnaStrana=new PretragaPage(driver);
    }


    @Test
    public void izaberiPonudu(){
        pocetnaStrana.izabKategoriju("Tasmanija","Hobart","Воз","02-03-2023","10-03-2023");
        assertEquals(driver.getCurrentUrl(),"http://localhost:3000/pretraga.php");
    }

    @Test
    public void prikazPonudeKont(){
        pocetnaStrana.prikaziKont();
        assertEquals(driver.getCurrentUrl(),"http://localhost:3000/pretraga.php");
    }


}


