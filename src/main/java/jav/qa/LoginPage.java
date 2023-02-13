package jav.qa;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindBy;

public class LoginPage extends basePage{
    public LoginPage(WebDriver driver) {
        super(driver);
    }

    @FindBy(xpath = "//*[@class=\"login-form\"]/input")
    WebElement username;

    @FindBy(xpath = "//*[@class=\"login-form\"]/input[2]")
    WebElement password;

    @FindBy(xpath = "//*[@class=\"login-form\"]/input[3]")
    WebElement loginButton;



    public void Login(String username,String password){
        this.username.sendKeys(username);
        this.password.sendKeys(password);
        loginButton.click();
    }



}
