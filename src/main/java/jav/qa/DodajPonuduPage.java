package jav.qa;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindBy;
import org.openqa.selenium.support.ui.Select;

public class DodajPonuduPage extends basePage{

    public DodajPonuduPage(WebDriver driver) {
        super(driver);
    }

    @FindBy(xpath = "//*[@class=\"dodaj-date-picker\"]/input")
    WebElement datum;
    @FindBy(xpath = "//*[@class=\"dodaj-inputs\"]/input")
    WebElement cena;
    @FindBy(xpath = "//*[@class=\"dodaj-inputs\"]/input[2]")
    WebElement cena_prevoza;
    @FindBy(xpath = "//*[@class=\"dodaj-select-menu\"]/select")
    WebElement polaz;
    @FindBy(xpath = "//*[@class=\"dodaj-select-menu\"]/select[2]")
    WebElement lok1;
    @FindBy(xpath = "//*[@class=\"dodaj-select-menu\"]/select[3]")
    WebElement sme1;
    @FindBy(xpath = "//*[@class=\"dodaj-select-menu\"]/select[4]")
    WebElement br_dan1;
    @FindBy(xpath = "//*[@class=\"dodaj-select-menu\"]/select[5]")
    WebElement lok2;
    @FindBy(xpath = "//*[@class=\"dodaj-select-menu\"]/select[6]")
    WebElement sme2;
    @FindBy(xpath = "//*[@class=\"dodaj-select-menu\"]/select[7]")
    WebElement br_dan2;
    @FindBy(xpath = "//*[@class=\"dodaj-select-menu\"]/select[8]")
    WebElement lok3;
    @FindBy(xpath = "//*[@class=\"dodaj-select-menu\"]/select[9]")
    WebElement sme3;
    @FindBy(xpath = "//*[@class=\"dodaj-select-menu\"]/select[10]")
    WebElement br_dan3;
    @FindBy(xpath = "//*[@class=\"dodaj-select-menu\"]/select[11]")
    WebElement lok4;
    @FindBy(xpath = "//*[@class=\"dodaj-select-menu\"]/select[12]")
    WebElement sme4;
    @FindBy(xpath = "//*[@class=\"dodaj-select-menu\"]/select[13]")
    WebElement br_dan4;
    @FindBy(xpath = "//*[@class=\"dodaj-select-menu\"]/select[14]")
    WebElement lok5;
    @FindBy(xpath = "//*[@class=\"dodaj-select-menu\"]/select[15]")
    WebElement sme5;
    @FindBy(xpath = "//*[@class=\"dodaj-select-menu\"]/select[16]")
    WebElement br_dan5;
    @FindBy(xpath = "//*[@class=\"dodaj-select-menu\"]/select[17]")
    WebElement prevoz;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"opis1\"]")
    WebElement dan1;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"opis2\"]")
    WebElement dan2;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"opis3\"]")
    WebElement dan3;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"opis4\"]")
    WebElement dan4;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"opis5\"]")
    WebElement dan5;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"opis6\"]")
    WebElement dan6;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"opis7\"]")
    WebElement dan7;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"opis8\"]")
    WebElement dan8;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"opis9\"]")
    WebElement dan9;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"opis10\"]")
    WebElement dan10;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"banja1\"]")
    WebElement cek1;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"stadion1\"]")
    WebElement cek2;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"muzej2\"]")
    WebElement cek3;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"opera2\"]")
    WebElement cek4;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"stadion3\"]")
    WebElement cek5;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"opera3\"]")
    WebElement cek6;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"muzej4\"]")
    WebElement cek7;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"banja4\"]")
    WebElement cek8;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"brod5\"]")
    WebElement cek9;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"krstarenje5\"]")
    WebElement cek10;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"park6\"]")
    WebElement cek11;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"muzej6\"]")
    WebElement cek12;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"stadion7\"]")
    WebElement cek13;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"klub7\"]")
    WebElement cek14;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"opera8\"]")
    WebElement cek15;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"park8\"]")
    WebElement cek16;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"jezero9\"]")
    WebElement cek17;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"brod9\"]")
    WebElement cek18;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"soping10\"]")
    WebElement cek19;
    @FindBy(xpath = "//*[@class=\"fakultative-opis\"]//*[@id=\"muzej10\"]")
    WebElement cek20;
    @FindBy(xpath = "//*[@class=\"dugme-potvrdi-ponudu\"]//*[@class=\"button-dodaj\"]")
    WebElement dodaj;



    public void dodajPonudu(String datum,String cena,String cen_pre,String po,String lk1,String sm1,String b1,String lk2,String sm2,String b2,String lk3,String sm3,String b3,String lk4,String sm4,String b4,String lk5,String sm5,String b5,String pre,String lorem){

        this.datum.sendKeys(datum);
        this.cena.sendKeys(cena);
        this.cena_prevoza.sendKeys(cen_pre);
        Select izbor = new Select(polaz);
        Select izbor1 = new Select(lok1);
        Select izbor2 = new Select(sme1);
        Select izbor3 = new Select(br_dan1);
        Select izbor4 = new Select(lok2);
        Select izbor5 = new Select(sme2);
        Select izbor6 = new Select(br_dan2);
        Select izbor7 = new Select(lok3);
        Select izbor8 = new Select(sme3);
        Select izbor9 = new Select(br_dan3);
        Select izbor10 = new Select(lok4);
        Select izbor11 = new Select(sme4);
        Select izbor12 = new Select(br_dan4);
        Select izbor13 = new Select(lok5);
        Select izbor14 = new Select(sme5);
        Select izbor15 = new Select(br_dan5);
        Select izbor16 = new Select(prevoz);
        izbor.selectByVisibleText(po);
        izbor1.selectByVisibleText(lk1);
        izbor2.selectByVisibleText(sm1);
        izbor3.selectByVisibleText(b1);
        izbor4.selectByVisibleText(lk2);
        izbor5.selectByVisibleText(sm2);
        izbor6.selectByVisibleText(b2);
        izbor7.selectByVisibleText(lk3);
        izbor8.selectByVisibleText(sm3);
        izbor9.selectByVisibleText(b3);
        izbor10.selectByVisibleText(lk4);
        izbor11.selectByVisibleText(sm4);
        izbor12.selectByVisibleText(b4);
        izbor13.selectByVisibleText(lk5);
        izbor14.selectByVisibleText(sm5);
        izbor15.selectByVisibleText(b5);
        izbor16.selectByVisibleText(pre);
        this.dan1.sendKeys(lorem);
        this.dan2.sendKeys(lorem);
        this.dan3.sendKeys(lorem);
        this.dan4.sendKeys(lorem);
        this.dan5.sendKeys(lorem);
        this.dan6.sendKeys(lorem);
        this.dan7.sendKeys(lorem);
        this.dan8.sendKeys(lorem);
        this.dan9.sendKeys(lorem);
        this.dan10.sendKeys(lorem);
        cek1.click();
        cek2.click();
        cek3.click();
        cek4.click();
        cek5.click();
        cek6.click();
        cek7.click();
        cek8.click();
        cek9.click();
        cek10.click();

        dodaj.click();



    }

}
