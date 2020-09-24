using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.IO.Ports;
using System.Threading;

namespace LabServices
{
    public class SerialConfig
    {
        static SerialPort _serialPort;
        public static string _PortMessage;
        public static Boolean _PortStatus;
        public static string _Value;

        public static void PortSetting(string Config)
        {
            string[] LineConfig = new string[] { "" };

            _serialPort = new SerialPort();

            LineConfig = Config.Split('|');

            _serialPort.PortName = LineConfig[0];
            _serialPort.BaudRate = Int32.Parse(LineConfig[1]);
            _serialPort.DataBits = Int32.Parse(LineConfig[2]);
            _serialPort.Parity = (Parity)Enum.Parse(typeof(Parity), LineConfig[3]);
            _serialPort.StopBits = (StopBits)Enum.Parse(typeof(StopBits), LineConfig[4]);
            _serialPort.Handshake = (Handshake)Enum.Parse(typeof(Handshake), LineConfig[5]);

            // Set the read/write timeouts in mili secon
            //_serialPort.ReadTimeout = 500;
            //_serialPort.WriteTimeout = 500;

            //Console.WriteLine("SETTING PORT OK");

        }

        public static void PortOpen()
        {
            

            if (cekportReady())
            {
                
                try
                {
                    _serialPort.Open();
                    Console.WriteLine("PORT OPEN");

                    _Value = _serialPort.ReadLine();
                    //_Value = _serialPort.ReadExisting();
                    Console.WriteLine("VALUE : {0}", _Value);

                    
                }
                catch (Exception ex)
                {
                    
                    try
                    {
                        //_Value = _serialPort.ReadLine();
                        //Console.WriteLine("VALUE : {0}", _Value);
                    }
                    catch
                    {
                        _PortMessage = ex.Message;
                        Console.WriteLine("ERROR", _PortMessage);
                    }
                }
            }
           
        }


        public static void PortClose()
        {
            _serialPort.Close();
        }

        public static Boolean cekportReady()
        {
            string SetportName = _serialPort.PortName;
            Boolean YesNo;

            YesNo = false;

            Console.WriteLine("Chek Available Ports:");
            foreach (string s in SerialPort.GetPortNames())
            {

                if (SetportName == s)
                {
                    YesNo = true;

                    break;
                }
            }

            if (YesNo)
            {
                Console.WriteLine(" PORT : {0} READY", SetportName);

            }
            else
            {
                _PortMessage = " PORT : " + SetportName + " NOT AVAILABLE";

                Console.WriteLine(" PORT : {0} NOT AVAILABLE", SetportName);
            }

            _PortStatus = YesNo;

            return YesNo;
        }


    }


}
