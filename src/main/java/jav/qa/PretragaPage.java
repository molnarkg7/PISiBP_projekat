package jav.qa;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindBy;
import org.openqa.selenium.support.ui.Select;

public class PretragaPage extends basePage {

    public PretragaPage(WebDriver driver) {
        super(driver);
    }

    @FindBy(xpath = "//*[@class=\"search-bar\"]/select")
    WebElement drzava;

    @FindBy(xpath = "//*[@class=\"search-bar\"]/select[2]")
    WebElement lokacija;

    @FindBy(xpath = "//*[@class=\"dugme_pretraga\"]")
    WebElement dugme_pretraga;

    @FindBy(xpath = "//*[@class=\"transport-type\"]/select")
    WebElement prevoz;

    @FindBy(xpath = "//*[@class=\"grid-info\"]/button")
    WebElement dugme_kont;

    @FindBy(xpath = "//*[@class=\"navtop-list\"]/a[2]")
    WebElement addkor;
    @FindBy(xpath = "//*[@class=\"date-picker\"]//*[@name=\"polazak\"]")
    WebElement polazak;
    @FindBy(xpath = "//*[@class=\"date-picker\"]//*[@name=\"povratak\"]")
    WebElement povratak;



    public void izabKategoriju(String drz,String lok,String pre,String pol,String pov) {
        Select izbor = new Select(drzava);
        Select izbor1 = new Select(lokacija);
        Select izbor2 = new Select(prevoz);
        izbor.selectByVisibleText(drz);
        izbor1.selectByVisibleText(lok);
        izbor2.selectByVisibleText(pre);
        this.polazak.sendKeys(pol);
        this.povratak.sendKeys(pov);

        dugme_pretraga.click();
    }
    public void prikaziKont(){
        dugme_kont.click();
    }

}



