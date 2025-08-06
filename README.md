# Arch Linux Installation

---

This repository documents a minimal Arch Linux installation created to repurpose an old, unused machine and gain hands-on experience working with a personal server and custom development environment. What began as a way to host my own projects and portfolio site for free evolved into a deeper dive into real-world systems—covering topics like servers, networking, security, and self-hosting. By using a machine like the ThinkPad T400, I avoided risking my daily computer and gained valuable insight into bootstrapping Arch Linux directly onto a bare SSD, rather than relying on the safety of virtualization.

---

## Table of Contents

- [Installation and Practical Notes](#installation-and-practical-notes)
  - [The Bones](#the-bones)
  - [The Nerves](#the-nerves)
  - [The Meat](#the-meat)
- [Commands Overview](#commands-overview)
- [Lessons Learned](#lessons-learned)

---

## Installation and Practical Notes

In this section, I will walk you through my journey from only knowing basic Linux commands like `ls` and `cd` to installing a minimal server.

### The Bones

The first step was to find a piece of hardware to put Linux on. As a broke college student, my options were... limited. Thankfully, after digging around in my girlfriend's basement I found an old ThinkPad T400 that nobody wanted.

However, if you know anything about ThinkPads—which I did not—after a little research it becomes obvious that some upgrades are needed. On the bright side, ThinkPads stay surprisingly relevant for Linux due to their upgradability, unlike the modern consumerist laptops made today. Once again though, due to my financials, upgrades needed to be minimal and give me the most value per dollar spent since one wrong move would mean eating ice cubes for dinner with a side of financial regret.

Taking that into account, I chose **RAM and the drive** as my core upgrades, with a few others for later. Specifically, having more RAM means better multitasking, which—for a webserver/live portfolio/NAS—is paramount. Finally, switching from a hard drive to an SSD not only makes things like boot time and program launching faster, but also makes the install process itself much quicker.

The last physical piece to this setup realistically is the ISO file which, to my dismay, was an image of Arch Linux on a bootable media used to bootstrap Linux to the SSD. At this point, you may be asking "what's wrong with that?" Well, as hard as this is to believe, I had already gone over budget so a bootable USB was out of the picture.

This is where things became truly *Linux*. Instead of using USB, I found some blank CDs and did some research. Turns out, CDs are basically just the analog version of USBs—and yes, you most definitely can burn ISOs onto them. Who would've thought I would be in a library burning CDs to boot a ThinkPad T400 in 2025? Talk about a blast from the past.

We have now laid down the skeleton for the server. Next up is the nervous system.

### The Nerves

What would be the brain and extensive nervous system in the human body is, in my own absurd reality, the operating system of a computer. However, in this context, Arch Linux is more of an alien mind parasite—slowly taking control of its provided braindead host while we observe from a safe distance, studying the process.

Despite the weirdly vivid imagery, I described Arch Linux in this carefully dramatic way because it is surprisingly accurate. So, keep that in mind while we go through my process.

The first step is to give our host the parasite—or in other words, put the CD in the disk drive. We boot into the BIOS and choose the disk to boot on. Then we see the Linux startup log (and I feel like I'm hacking the Pentagon). All that’s left now is to type `archinstall` in the terminal, press enter, and choose what software and configurations you want. Regrettably, I followed the Arch Wiki manually before learning this command existed. Ironically, that is exactly why I can now explain what Linux does under the hood.

In the metaphor I talk about a "provided braindead host" which references the SSD. The SSD has nothing on it to start, which is why the host would be considered braindead. Linux takes that blank canvas and creates a partitioning table that allows it to organize the space in a way where it understands where everything is. In a nutshell, when you use `archinstall`, Linux is literally formatting and cloning itself to the hardware and reproducing itself just like a virus replicates itself in host cells.

With our little makeshift Linux mind virus now in full control of this Frankenstein project, we can move on to the good stuff. It's time to give this thing some meat.

### The Meat

The last step to this process is one that never truly finishes. Adding the meat to our Frankenstein project is as simple as knowing what you want and looking up software that does that for you.

For this project, there are a few main things it needs. To be a live portfolio/webserver/NAS, we will need a mix of daemons (programs that persistently run in the background) and other services. Specifically, I used a combination of **MariaDB, PHP support, Apache, OpenSSH, Tailscale, UFW, NetworkManager**, and some lightweight GUI and customization software.

## Commands Overview

To enable daemons on Arch:

```bash
sudo systemctl start [program name]
sudo systemctl enable [program name]
```

To check if it is running properly:

```bash
sudo systemctl status [program name]
```

For most other software, you’ll mostly be looking up how to edit default configs or change them depending on what you want them to do.

In general, the choice of programs (or Frankenstein flavor) is going to be wildly different depending on your needs—but these services fit my specific needs best. For the most part, I used MariaDB, PHP, and OpenSSH just because I already had some experience with them and a lot of my school projects rely on PHP and MariaDB.

But what would be the point of having this support if you can only see them on your local machine? I mean half the reason computers are so cool is because you can access your own website from any computer.

Now, this leads me to basically the rest of my software choices. When you get this far, you run into things like IP addresses and networking. Originally, I had a dynamic IP address and had configured DuckDNS to create my own little webserver that worked with a free subdomain. Set up properly, a subdomain means you can now easily use SFTP from anywhere for file transfers—which is just as useful as hosting a website. The addition of SFTP really makes the server feel real and useful.

Of course, this also begs the question: *"If he has all this set up, why does he have Tailscale?"* Well, you're right to ask that because Tailscale does all of that and more. Realistically, Tailscale is overkill and dynamic IPs are a good learning experience—but I chose to use Tailscale because life got messy.

Long story short, I moved to a new apartment where they provided Metronet fiber optic Wi-Fi with rent. As cheap as I am, there was no way I was going to not use fiber optic internet that comes with rent—even if it meant sacrificing my soul. After many calls to Metronet and a landlord who refused to even converse with a mere mortal like me, I got my own router and took things into my own hands.

I am now convinced that all my neighbors probably gave up and bought Wi-Fi from different providers. Regardless, everything was going great until—of course—nothing worked anymore. Because, well... why would it?

After some research, I realized that sometimes fiber optic companies use **CGNAT**, which is a type of security that renders port forwarding useless—*unless* you want to upgrade. But I had already used CDs instead of a flash drive, so this was not going to stop me.

By being cheap, I inadvertently found Tailscale—which honestly was the best software I had ever encountered. Not only does it do everything I just set up on my server in a mesh system, but it also bypassed Metronet's CGNAT. A CGNAT basically blocks all incoming connection requests, but Tailscale connects two devices using two outgoing requests that meet in a type of middleman—completely bypassing that process.

I mean, after learning about that I honestly felt like I had just escaped the matrix.

---

## Lessons Learned

- There’s no such thing as “too old” of a machine if you’re willing to tinker
- CDs still slap (kinda)
- Tailscale is your best friend when CGNAT kills your port forwarding dreams
- Manual installs teach you what’s actually happening under the hood
- Being broke can lead to smarter solutions than just throwing money at a problem

---

If you're broke, stubborn, and like tinkering with systems until they work, you might just enjoy setting up your own Frankenstein Linux box too.

