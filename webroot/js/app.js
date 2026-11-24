/**
 * PatientCare Modern Client Interactions & Enhancements
 */
document.addEventListener('DOMContentLoaded', function () {
    // 1. Mobile Navigation Toggle
    const mobileToggle = document.querySelector('.mobile-nav-toggle');
    const mobileDrawer = document.querySelector('.mobile-nav-drawer');

    if (mobileToggle && mobileDrawer) {
        mobileToggle.addEventListener('click', function (e) {
            e.stopPropagation();
            const isOpen = mobileDrawer.classList.toggle('open');
            mobileToggle.innerHTML = isOpen 
                ? '<i class="fa-solid fa-xmark"></i>' 
                : '<i class="fa-solid fa-bars"></i>';
        });

        // Close on outside click
        document.addEventListener('click', function (e) {
            if (!mobileDrawer.contains(e.target) && !mobileToggle.contains(e.target)) {
                if (mobileDrawer.classList.contains('open')) {
                    mobileDrawer.classList.remove('open');
                    mobileToggle.innerHTML = '<i class="fa-solid fa-bars"></i>';
                }
            }
        });
    }

    // 2. Flash Messages Smooth Dismissal
    const flashMessages = document.querySelectorAll('.message');
    flashMessages.forEach(function (msg) {
        msg.addEventListener('click', function () {
            msg.style.opacity = '0';
            msg.style.transform = 'translateY(-10px)';
            setTimeout(function () {
                msg.remove();
            }, 250);
        });

        // Auto dismiss success messages after 6 seconds
        if (msg.classList.contains('success')) {
            setTimeout(function () {
                if (msg && msg.parentNode) {
                    msg.style.opacity = '0';
                    msg.style.transform = 'translateY(-10px)';
                    setTimeout(function () {
                        if (msg && msg.parentNode) msg.remove();
                    }, 250);
                }
            }, 6000);
        }
    });

    // 3. Enhance Action Links with Crisp Icons if missing
    document.querySelectorAll('.actions a').forEach(function (link) {
        const text = link.textContent.trim().toLowerCase();
        if (!link.querySelector('i')) {
            if (text === 'view') {
                link.innerHTML = '<i class="fa-solid fa-eye"></i> ' + link.innerHTML;
            } else if (text === 'edit') {
                link.innerHTML = '<i class="fa-solid fa-pen-to-square"></i> ' + link.innerHTML;
            } else if (text === 'delete') {
                link.innerHTML = '<i class="fa-solid fa-trash-can"></i> ' + link.innerHTML;
            }
        }
    });

    // 4. Enhance Side-Nav Items with Icons
    document.querySelectorAll('.side-nav-item').forEach(function (link) {
        const text = link.textContent.trim().toLowerCase();
        if (!link.querySelector('i')) {
            if (text.includes('new') || text.includes('add')) {
                link.innerHTML = '<i class="fa-solid fa-circle-plus"></i> ' + link.innerHTML;
            } else if (text.includes('edit')) {
                link.innerHTML = '<i class="fa-solid fa-pen-to-square"></i> ' + link.innerHTML;
            } else if (text.includes('delete')) {
                link.innerHTML = '<i class="fa-solid fa-trash-can" style="color: #ef4444;"></i> ' + link.innerHTML;
            } else if (text.includes('list')) {
                link.innerHTML = '<i class="fa-solid fa-list-ul"></i> ' + link.innerHTML;
            } else {
                link.innerHTML = '<i class="fa-solid fa-chevron-right"></i> ' + link.innerHTML;
            }
        }
    });

    // 5. Enhance Table Header "New ..." Buttons with a Plus Icon
    document.querySelectorAll('.index.content > a.button').forEach(function (btn) {
        if (!btn.querySelector('i')) {
            btn.innerHTML = '<i class="fa-solid fa-plus"></i> ' + btn.innerHTML;
        }
    });

    // 6. Style "Accepting Patients" Yes/No in tables automatically into badges
    document.querySelectorAll('tbody td').forEach(function (td) {
        const text = td.textContent.trim();
        if (text === 'Yes' && td.querySelector('span[style*="green"]')) {
            td.innerHTML = '<span class="badge-status badge-status-yes"><i class="fa-solid fa-circle-check"></i> Accepting</span>';
        } else if (text === 'No' && td.querySelector('span[style*="red"]')) {
            td.innerHTML = '<span class="badge-status badge-status-no"><i class="fa-solid fa-circle-xmark"></i> Unavailable</span>';
        }
    });
});
