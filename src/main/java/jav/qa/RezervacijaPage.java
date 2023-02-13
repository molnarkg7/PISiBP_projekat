package jav.qa;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindBy;

public class RezervacijaPage extends basePage{

    public RezervacijaPage(WebDriver driver) {
        super(driver);
    }

    @FindBy(xpath = "//*[@class=\"login-form\"]/input")
    WebElement ime;
    @FindBy(xpath = "//*[@class=\"login-form\"]/input[2]")
    WebElement prezime;
    @FindBy(xpath = "//*[@class=\"login-form\"]/input[3]")
    WebElement telefon;
    @FindBy(xpath = "//*[@class=\"login-form\"]/input[4]")
    WebElement mejl;
    @FindBy(xpath = "//*[@class=\"login-form\"]/input[5]")
    WebElement odrasli;
    @FindBy(xpath = "//*[@class=\"login-form\"]/input[6]")
    WebElement deca;
    @FindBy(xpath = "//*[@name=\"lok\"]")
    WebElement lok;
    @FindBy(xpath = "//*[@id=\"komentar\"]")
    WebElement komentar;
    @FindBy(xpath = "//*[@value=\"Картица\"]")
    WebElement placanje;
    @FindBy(xpath = "//*[@class=\"login-form\"]/button")
    WebElement loginButton;

    public void Rezervacija(String ime,String prezime,String tel,String  mejl,String odrasli,String deca,String kom){
        this.ime.sendKeys(ime);
        this.prezime.sendKeys(prezime);
        this.telefon.sendKeys(tel);
        this.mejl.sendKeys(mejl);
        this.odrasli.sendKeys(odrasli);
        this.deca.sendKeys(deca);
        this.komentar.sendKeys(kom);
        placanje.click();
        loginButton.click();
    }


}
