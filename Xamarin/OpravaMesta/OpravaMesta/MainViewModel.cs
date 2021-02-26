﻿using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Text;
using Xamarin.Forms;

namespace OpravaMesta
{
    public class MainViewModel : INotifyPropertyChanged
    {
        public event PropertyChangedEventHandler PropertyChanged;

        private string meno = "Meno";
        private string priezvisko = "Priezvisko";
        private string mesto = "Mesto";
        private int hodnotenie = 0;
        private int prispevky = 0;
        private Image profilePhoto;

        private static MainViewModel _mainViewModel;

        public static MainViewModel GetMainViewModel()
        {
            if (_mainViewModel == null)
            {
                _mainViewModel = new MainViewModel();
            }

            return _mainViewModel;
        }

        public Image ProfilePhoto
        {
            get { return profilePhoto; }
            set { profilePhoto = value; }
        }

        public string Meno
        {
            get { return $"Meno: {meno}"; }
            set { meno = value; }
        }

        public string Priezvisko
        {
            get { return $"Priezvisko: {priezvisko}"; }
            set { priezvisko = value; }
        }

        public string Mesto
        {
            get { return $"Mesto: {mesto}"; }
            set { mesto = value; }
        }

        public int Hodnotenie
        {
            get { return hodnotenie; }
            set { hodnotenie = value; }
        }

        public string StringHodnotenie
        {
            get { return $"Hodnotenie: {hodnotenie}"; }
        }

        public int Prispevky
        {
            get { return prispevky; }
            set { prispevky = value; }
        }
        public string StringPrispevky
        {
            get { return $"Prispevky: {prispevky}"; }
        }

        void OnPropertyChanged(string name)
        {
            PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(name));
        }
    }
}
