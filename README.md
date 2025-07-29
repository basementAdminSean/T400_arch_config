# Arch Linux Installation
---
This repository documents a minimal Arch Linux installation created to repurpose an old, unused machine and gain hands-on experience working with a personal server and custom development environment. What began as a way to host my own projects and portfolio site for free evolved into a deeper dive into real-world systems—covering topics like servers, networking, security, and self-hosting.
By using a machine like the ThinkPad T400, I avoided risking my daily computer and gained valuable insight into bootstrapping Arch Linux directly onto a bare SSD, rather than relying on the safety of virtualization.

# Installation and Practical Notes
---
In this section, I will walk you through my journey from only knowing basic linux commands like "ls" and "cd" to installing a minimal server

## The Bones
---
The first step was to find a piece of hardware to put linux on. As a broke college student, my options were...  limited. Thankfully, after digging around in my girlfriend's basement I found an old Thinkpad T400 that nobody wanted.

However, if you know anything about Thinkpads, which I did not, after a little research it is obviously clear that some upgrades are needed. On the bright side, Thinkpads stay surprisingly relevant for linux due to their upgradability, unlike the modern consumerist laptops made today. Once again though, due to my financials upgrades needed to be minimal and give me the most value per dollar spent since one wrong move will mean eating ice cubes for dinner with a side of financial regret. Taking that into account, I chose **RAM and the drive** as my core upgrades with a few others for later. Specifically, having more RAM means better multitasking which, for a webserver/live portfolio/NAS is paramount. Finally switching from a Hard Drive to an SSD not only makes things like boot time and program launching faster but actually makes the install process itself much faster.

The last physical piece to this setup realistically is the ISO file which, to my dismay, was an image of Arch Linux on a bootable media used to bootstrap linux to the SSD. At this point, you may be asking "what's wrong with that?". Well, as hard as this is to believe, I had already gone over budget so a bootable USB was out of the picture. This is where things became truly *Linux*. Instead of using USB I found some blank CD's and did some research. Turns out, CD's are basically just the analog version of USB's - and yes, you most definitely can burn ISO's onto them. Who would've thought I would be in a library burning CD's to boot a Thinkpad T400 in 2025? Talk about a blast from the past.

We have now laid down the skeleton for the server, next up is the nervous system.

## The Nerves
---
What would be the brain and extensive nervous system in the human body is, in my own absurd reality, the operating system of a computer. However, in this context, Arch Linux is more of an alien mind parasite — slowly taking control of its provided braindead host while we observe from a safe distance, studying the process. Despite the weirdly vivid imagery, I described Arch Linux in this carefully dramatic way because it is surprisingly accurate. So, keep that in mind while we go through my process.

The first step is to give our host the parasite, or in other words, put the CD in the disk drive. We boot into the BIOS and choose the disk to boot on. Then we see the Linux start up log (and I feel like I'm hacking the pentagon). All that is left now is to type "archinstall" in the terminal, press enter, and choose what software and configurations you want. Regrettably, I followed the Arch Wiki manually before learning this command existed. Ironically, that is exactly why I can now explain what linux does under the hood.

In the metaphor I talk about a "provided braindead host" which references the SSD. The SSD has nothing on it to start which is why the host would be considered braindead. Linux takes that blank canvas and creates a partitioning table that basically allows Linux to organize it in a way where it understands where everything is. In a nutshell, when you use archinstall Linux is literally formatting and cloning itself to the hardware and reporducing itself just like a virus replicates itself in host cells.

With our little makeshift Linux mind virus now in full control of this Frankenstein project, we can move on to the good stuff. It's time to give this thing some meat.
