using System.Diagnostics;
using Microsoft.AspNetCore.Mvc;
using LandingPage.Models;
using System.Net;
using System.Net.Mail;
using System.Threading.Tasks;
using System.Text.Json;

namespace LandingPage.Controllers;

public class HomeController : Controller
{
    private readonly ILogger<HomeController> _logger;
    private readonly HttpClient _httpClient;

    public HomeController(ILogger<HomeController> logger, HttpClient httpClient)
    {
        _logger = logger;
        _httpClient = new HttpClient();
    }


    public async Task<IActionResult> Index()
    {
        string apiURL = "http://localhost:8080/CO2_Data";
        try
        {
            HttpResponseMessage response = await _httpClient.GetAsync(apiURL);
            response.EnsureSuccessStatusCode();

            string apiResponse = await response.Content.ReadAsStringAsync();
            ViewBag.Message = apiResponse;
            return View();

        }
        catch (HttpRequestException e)
        {
            ViewBag.Message = $"API call failed with status: {e.Message}";
            return View();
        }
    
    }

    [HttpPost]
    public IActionResult SubmitForm(PurchaseModel model)
    {
        var smtpClient = new SmtpClient("smtp.gmail.com")
        {
            Port = 587,
            Credentials = new NetworkCredential("PedalPulseBot@gmail.com", "yfju ynbq iglo niuh"),
            EnableSsl = true,
        };

        var mailMessage = new MailMessage()
        {
            From = new MailAddress("PedalPulseBot@gmail.com"),
            Subject = $"Message from{model.Name}",
            Body = $"Email: {model.Email}\n\nPhoneNumber : {model.PhoneNumber}\n\nInquiry : {model.Inquiry}",
            IsBodyHtml = false,
        };

        mailMessage.To.Add("anish@integratedwebworks.com");
        smtpClient.Send(mailMessage);
        return RedirectToAction("Index");
    }

    [ResponseCache(Duration = 0, Location = ResponseCacheLocation.None, NoStore = true)]
    public IActionResult Error()
    {
        return View(new ErrorViewModel { RequestId = Activity.Current?.Id ?? HttpContext.TraceIdentifier });
    }
}
