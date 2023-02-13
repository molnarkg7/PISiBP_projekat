package jav.qa;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindBy;
import org.openqa.selenium.support.ui.Select;

public class DodajKorisnika extends basePage{

    public DodajKorisnika(WebDriver driver) {
        super(driver);
    }

    @FindBy(xpath = "//*[@class=\"login-form\"]/input")
    WebElement user_ime;
    @FindBy(xpath = "//*[@class=\"login-form\"]/input[2]")
    WebElement ime;
    @FindBy(xpath = "//*[@class=\"login-form\"]/input[3]")
    WebElement prezime;
    @FindBy(xpath = "//*[@class=\"login-form\"]/input[4]")
    WebElement mail;
    @FindBy(xpath = "//*[@class=\"login-form\"]/input[5]")
    WebElement sifra;
    @FindBy(xpath = "//*[@class=\"login-form\"]/input[6]")
    WebElement mobilni;
    @FindBy(xpath = "//*[@class=\"login-form\"]/select")
    WebElement rola;
    @FindBy(xpath = "//*[@class=\"login-form\"]/button")
    WebElement dodaj;
    @FindBy(xpath = "//*[@class=\"navtop-list\"]/a[2]")
    WebElement aranzman;

    public void dodajKorisnika(String user,String ime,String prezime,String mail,String sifra,String mobilni,String rol) {
        this.user_ime.sendKeys(user);
        this.ime.sendKeys(ime);
        this.prezime.sendKeys(prezime);
        this.mail.sendKeys(mail);
        this.sifra.sendKeys(sifra);
        this.mobilni.sendKeys(mobilni);
        Select izbor = new Select(rola);
        izbor.selectByVisibleText(rol);
        dodaj.click();
    }
}

