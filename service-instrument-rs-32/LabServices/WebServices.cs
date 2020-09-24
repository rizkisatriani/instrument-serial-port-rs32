using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Web.Http;
using System.Web.Http.SelfHost;
using System.Web.Http.Cors;

namespace LabServices
{
    class WebServices
    {
        public static void StartWebServer()
        {
            var localURLConf = "http://localhost:8080";
            var config = new HttpSelfHostConfiguration(localURLConf);

            //config.Routes.MapHttpRoute("Default", "api/{controller}/{id}", new { id = RouteParameter.Optional });
            config.MapHttpAttributeRoutes();
            config.Routes.MapHttpRoute(
                name: "Default",
                routeTemplate: "api/{controller}/{id}",
                defaults: new { id = RouteParameter.Optional }
                
            );

            EnableCorsAttribute cors = new EnableCorsAttribute("*", "*", "*");
            config.EnableCors(cors);

            config.MessageHandlers.Add(new ApiKeyMessageHendler());
            //jika akan mengaktifkan Key api ini di aktifkan
            
            var server = new HttpSelfHostServer(config);

            try
            {
                server.OpenAsync().Wait();
                Console.WriteLine("API SERVER UP.. on " + localURLConf);

            }
            catch
            {
                Console.WriteLine("Error opening server.");
                Console.WriteLine();
                Console.WriteLine("This error usually means that either this application or Visual Studio itself ");
                Console.WriteLine("is not running with elevated permissions.");
                Console.WriteLine();
                Console.WriteLine("Try running Visual Studio as Administrator by right-clicking on the ");
                Console.WriteLine("Visual Studio icon, and selecting 'Run as Administrator'");
                Console.WriteLine();
                Console.WriteLine("Another work around is to open a command prompt as administrator and type:");
                Console.WriteLine("netsh http add urlacl url=http://+:21212/ user='machine'\'username'");
                Console.WriteLine("replacing 'machine'\'username' with your machine name, and user name.");
            }
        }
    }
}
