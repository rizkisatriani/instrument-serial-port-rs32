using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Net.Http;
using System.Threading;
using System.Net;
using System.Web.Http.Cors;

namespace LabServices
{
    
    public class ApiKeyMessageHendler : DelegatingHandler
    {
        
        protected override async Task<HttpResponseMessage> SendAsync(HttpRequestMessage httpRequestMessage, CancellationToken cancellationToken)
        {
            bool validKey = false;
            IEnumerable<string> requestHeaders;
            
            //Console.WriteLine("{0}", httpRequestMessage.Method.ToString());

            if (httpRequestMessage.Method != HttpMethod.Options)
            {
                var checkAPIkeyExists = httpRequestMessage.Headers.TryGetValues("App-Key", out requestHeaders);

                if (checkAPIkeyExists)
                {
                    if (requestHeaders.FirstOrDefault().Equals("bengkelit") || requestHeaders.FirstOrDefault().Equals("e1d1c069a7f1b83bdf8b248f164d2c7"))
                    {
                        validKey = true;
                    }

                    if (!validKey)
                    {
                        var resp = httpRequestMessage.CreateResponse(HttpStatusCode.Forbidden, "Invalid Key Password");
                        resp.Headers.Add("Access-Control-Allow-Origin", "*");
                        return resp;
                    }

                    var response = await base.SendAsync(httpRequestMessage, cancellationToken);
                    return response;
                }
                else
                {
                    var resp = httpRequestMessage.CreateResponse(HttpStatusCode.Forbidden, "Invalid Key Password");
                    resp.Headers.Add("Access-Control-Allow-Origin", "*");
                    return resp;
                }

            }
            else
            {
                var response = await base.SendAsync(httpRequestMessage, cancellationToken);
                return response;
            }

            
        }
        


        /*
        protected override async Task<HttpResponseMessage> SendAsync( HttpRequestMessage httpRequestMessage, CancellationToken cancellationToken)
        {
            //EnableCorsAttribute cors = new EnableCorsAttribute("*", "*", "*");
            //config.EnableCors(cors);

            bool validKey = false;
            IEnumerable<string> requestHeaders;
            var checkAPIkeyExists = httpRequestMessage.Headers.TryGetValues("App-Key", out requestHeaders);

            Console.WriteLine("{0}", httpRequestMessage.Headers);

            if (checkAPIkeyExists)
            {
                if (requestHeaders.FirstOrDefault().Equals("bengkelit"))
                {
                    validKey = true;
                }
            }

            if (!validKey)
            {
                var resp = httpRequestMessage.CreateResponse(HttpStatusCode.Forbidden, "Invalid Key Password");
                //resp.Headers.Add("Access-Control-Allow-Origin", "*");
                return resp;
            }

            var response = await base.SendAsync(httpRequestMessage, cancellationToken);
            //response.Headers.Add("Access-Control-Allow-Origin", "*");
            //response.Headers.Add("Access-Control-Allow-Headers", "Content-Type");
            //response.Headers.Add("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE, OPTIONS");
            
            return response;
        }
         * */
    }
}
