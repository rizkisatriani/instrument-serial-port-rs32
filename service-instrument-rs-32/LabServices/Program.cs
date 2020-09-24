using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Topshelf;

namespace LabServices
{
    class Program
    {
        static void Main(string[] args)
        {
            var exitCode = HostFactory.Run( x =>
            {
                x.Service<Services>(s =>
                {
                    s.ConstructUsing(_services => new Services());
                    s.WhenStarted(_services => _services.Start());
                    s.WhenStopped(_services => _services.Stop());
                });

                //x.RunAs("", "");
                x.RunAsLocalSystem();
                x.StartAutomatically(); // Start the service automatically

                x.SetServiceName("GMPSerialComService");
                x.SetDisplayName("GMP Serial Comunication Service");
                x.SetDescription("GMP Serial Comunication Service API, PT Gunung Madu Plantations (IT-GMP 2020)");
        
            });

            int exitCodeValue = (int)Convert.ChangeType(exitCode, exitCode.GetTypeCode());
            Environment.ExitCode = exitCodeValue;
        }
    }
}
